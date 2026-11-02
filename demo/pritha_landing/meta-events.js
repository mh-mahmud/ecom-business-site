/**
 * Canonical Browser Tracking Module for Meta Pixel & Conversions API
 *
 * Implements ONE single browser-side event pipeline:
 * - Direct Meta Pixel tracking via window.fbq('trackSingle', PIXEL_ID, eventName, data, { eventID: id })
 * - Synchronized dataLayer contract for GTM tags (meta_event_id, meta_event_name)
 * - Deterministic, shared event IDs matching server-side Conversions API (CAPI)
 * - Reliable browser-to-server CAPI handshake for PageView, ViewContent, and InitiateCheckout
 * - Backend-authoritative Purchase event triggered only after successful DB order creation
 * - Idempotency guards preventing duplicate ViewContent, InitiateCheckout, and Purchase events
 * - ZERO phantom AddToCart events
 * - Non-blocking transport: CAPI handshake or Pixel failure never impedes user experience
 */
(function () {
    'use strict';

    // -------------------------------------------------------------
    // Configuration & Metadata Initialization
    // -------------------------------------------------------------

    let initData = {};
    const initScript = document.getElementById('pritha-meta-init-data');
    if (initScript) {
        try {
            initData = JSON.parse(initScript.textContent || '{}');
        } catch (e) {
            console.warn('Pritha Meta init data parse error:', e);
        }
    }

    const PIXEL_ID = initData.pixel_id || '3555032114661518';
    const PRODUCT_ID = initData.product_id || 'mahashankar-oral-care-combo';
    const PRODUCT_NAME = initData.product_name || 'Mahashankar Oral Care Combo';
    const UNIT_PRICE = parseFloat(initData.unit_price) || 900;
    const CURRENCY = initData.currency || 'BDT';

    // -------------------------------------------------------------
    // Cookie & Parameter Utilities
    // -------------------------------------------------------------

    function getCookie(name) {
        const matches = document.cookie.match(
            new RegExp('(?:^|; )' + name.replace(/([.$?*|{}()[\]\\/+^])/g, '\\$1') + '=([^;]*)')
        );
        return matches ? decodeURIComponent(matches[1]) : null;
    }

    function setCookie(name, value, days) {
        const d = new Date();
        d.setTime(d.getTime() + days * 24 * 60 * 60 * 1000);
        const isSecure = window.location.protocol === 'https:';
        document.cookie =
            encodeURIComponent(name) +
            '=' +
            encodeURIComponent(value) +
            '; expires=' +
            d.toUTCString() +
            '; path=/' +
            (isSecure ? '; Secure' : '') +
            '; SameSite=Lax';
    }

    // Preserve fbclid into _fbc cookie if not already set
    function preserveFbclid() {
        const urlParams = new URLSearchParams(window.location.search);
        const fbclid = urlParams.get('fbclid');
        if (fbclid && !getCookie('_fbc')) {
            const cleanFbclid = fbclid.replace(/[^a-zA-Z0-9_\-\.]/g, '');
            if (cleanFbclid) {
                const fbcVal = 'fb.1.' + Date.now() + '.' + cleanFbclid;
                setCookie('_fbc', fbcVal, 90);
            }
        }
    }

    // Populate hidden fields in order form for backend CAPI capture
    function populateHiddenFields() {
        const form = document.getElementById('orderForm');
        if (!form) return;

        const fbp = getCookie('_fbp');
        const fbc = getCookie('_fbc');
        const urlParams = new URLSearchParams(window.location.search);
        const fbclid = urlParams.get('fbclid');

        function setHidden(name, val) {
            if (!val) return;
            let el = form.querySelector('input[name="' + name + '"]');
            if (!el) {
                el = document.createElement('input');
                el.type = 'hidden';
                el.name = name;
                form.appendChild(el);
            }
            el.value = val;
        }

        if (fbp) setHidden('meta_fbp', fbp);
        if (fbc) setHidden('meta_fbc', fbc);
        if (fbclid) setHidden('meta_fbclid', fbclid);
    }

    // -------------------------------------------------------------
    // Meta Pixel Base Loader & Stub
    // -------------------------------------------------------------

    function ensurePixelInitialized() {
        if (!window.fbq) {
            (function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s);
            })(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
        }
        // Initialize pixel if not already initialized
        try {
            window.fbq('init', PIXEL_ID);
        } catch (e) {
            // Safe fallback
        }
    }

    function runWhenPixelReady(callback, attempt) {
        attempt = attempt || 0;
        if (typeof window.fbq === 'function') {
            callback();
            return;
        }
        if (attempt < 80) {
            setTimeout(function () {
                runWhenPixelReady(callback, attempt + 1);
            }, 100);
        }
    }

    function generateEventId(prefix) {
        return prefix + '_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
    }

    // -------------------------------------------------------------
    // Canonical Event Dispatcher & Server Handshake
    // -------------------------------------------------------------

    function dispatchCanonicalEvent(eventName, customData, eventId) {
        // 1. Synchronized dataLayer contract for GTM
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            event: 'meta_' + eventName.toLowerCase(),
            meta_event_name: eventName,
            meta_event_id: eventId,
            meta_pixel_id: PIXEL_ID,
            ecommerce: customData || {},
        });

        // 2. Direct Meta Pixel tracking with required deduplication key
        runWhenPixelReady(function () {
            try {
                window.fbq(
                    'trackSingle',
                    PIXEL_ID,
                    eventName,
                    customData || {},
                    { eventID: eventId }
                );
            } catch (e) {
                console.warn('Meta Pixel dispatch error (' + eventName + '):', e);
            }
        });
    }

    /**
     * Reliable non-blocking browser-to-server CAPI handshake.
     * Uses navigator.sendBeacon with keepalive fetch fallback.
     */
    function sendServerHandshake(eventName, eventId, customData, extraUserData) {
        try {
            const payload = {
                event_name: eventName,
                event_id: eventId,
                tracking_nonce: initData.tracking_nonce || '',
                custom_data: customData || {},
                fbp: getCookie('_fbp') || '',
                fbc: getCookie('_fbc') || '',
                source_url: window.location.href,
            };

            if (extraUserData && typeof extraUserData === 'object') {
                if (extraUserData.phone) payload.phone = extraUserData.phone;
                if (extraUserData.name) payload.name = extraUserData.name;
            }

            const jsonStr = JSON.stringify(payload);

            // Prefer navigator.sendBeacon for true non-blocking background transport
            if (navigator.sendBeacon) {
                const blob = new Blob([jsonStr], { type: 'application/json' });
                const queued = navigator.sendBeacon('meta-capi-endpoint.php', blob);
                if (queued) return;
            }

            // Fallback to fetch with keepalive: true
            if (typeof fetch === 'function') {
                fetch('meta-capi-endpoint.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: jsonStr,
                    keepalive: true,
                }).catch(function () {
                    // Silently ignore handshake errors; never impacts user experience
                });
            }
        } catch (e) {
            // Handshake failure must never block or degrade frontend functionality
        }
    }

    // -------------------------------------------------------------
    // Commerce Payload Helpers
    // -------------------------------------------------------------

    function getQuantity() {
        const el =
            document.getElementById('quantity') ||
            document.getElementById('qty') ||
            document.querySelector('[name="wcf_qty_selection"]');
        const qty = el ? parseInt(el.value, 10) : 1;
        return Number.isFinite(qty) && qty > 0 ? qty : 1;
    }

    function parseMoney(value) {
        if (!value) return null;
        const number = parseFloat(
            String(value).replace(/,/g, '').replace(/[^\d.]/g, '')
        );
        return Number.isFinite(number) ? number : null;
    }

    function getOrderValue() {
        const totalElement = document.getElementById('total') || document.getElementById('sum');
        if (totalElement) {
            const value = parseMoney(totalElement.textContent);
            if (value !== null && value > 0) {
                return value;
            }
        }
        return UNIT_PRICE * getQuantity();
    }

    function buildCommerceData() {
        const quantity = getQuantity();
        return {
            content_ids: [PRODUCT_ID],
            content_name: PRODUCT_NAME,
            content_type: 'product',
            contents: [
                {
                    id: PRODUCT_ID,
                    quantity: quantity,
                    item_price: UNIT_PRICE,
                },
            ],
            num_items: quantity,
            value: getOrderValue(),
            currency: CURRENCY,
        };
    }

    function getCustomerInputData() {
        const form = document.getElementById('orderForm');
        if (!form) return {};
        const phoneEl = form.querySelector('[name="billing_phone"]');
        const nameEl = form.querySelector('[name="billing_first_name"]');
        return {
            phone: phoneEl ? phoneEl.value.trim() : '',
            name: nameEl ? nameEl.value.trim() : '',
        };
    }

    // -------------------------------------------------------------
    // Lifecycle Event Triggers
    // -------------------------------------------------------------

    document.addEventListener('DOMContentLoaded', function () {
        ensurePixelInitialized();
        preserveFbclid();
        populateHiddenFields();

        // 1. PAGE VIEW (Fired once on page load; shared event_id with CAPI handshake)
        let pageViewTracked = false;
        function trackPageView() {
            if (pageViewTracked) return;
            pageViewTracked = true;
            const eventId = initData.pageview_event_id || generateEventId('pv');
            dispatchCanonicalEvent('PageView', {}, eventId);
            sendServerHandshake('PageView', eventId, {});
        }
        trackPageView();

        // 2. VIEW CONTENT (Fired once on landing page load; shared event_id with CAPI handshake)
        let viewContentTracked = false;
        function trackViewContent() {
            if (viewContentTracked) return;
            viewContentTracked = true;
            const eventId = initData.viewcontent_event_id || generateEventId('vc');
            const commerceData = buildCommerceData();
            dispatchCanonicalEvent('ViewContent', commerceData, eventId);
            sendServerHandshake('ViewContent', eventId, commerceData);
        }
        trackViewContent();

        // 3. INITIATE CHECKOUT (Fired once upon customer checkout interaction)
        let checkoutTracked = false;
        function initiateCheckout() {
            if (checkoutTracked) return;
            checkoutTracked = true;
            const eventId = initData.initiate_checkout_event_id || generateEventId('ic');
            const commerceData = buildCommerceData();
            const customerData = getCustomerInputData();
            dispatchCanonicalEvent('InitiateCheckout', commerceData, eventId);
            sendServerHandshake('InitiateCheckout', eventId, commerceData, customerData);
        }

        const form = document.getElementById('orderForm');
        if (form) {
            // Trigger upon focus on any billing input field
            const inputs = form.querySelectorAll('input, textarea, select');
            inputs.forEach(function (input) {
                input.addEventListener('focus', initiateCheckout, { once: true });
            });

            // Quantity buttons change indicates checkout intent
            const plusBtn = document.getElementById('plusBtn') || document.getElementById('plus');
            const minusBtn = document.getElementById('minusBtn') || document.getElementById('minus');
            if (plusBtn) plusBtn.addEventListener('click', initiateCheckout, { once: true });
            if (minusBtn) minusBtn.addEventListener('click', initiateCheckout, { once: true });

            form.addEventListener('submit', function () {
                initiateCheckout();
                populateHiddenFields();
            });
        }

        // 4. PURCHASE (Authoritative backend-driven, strictly idempotent)
        // Reads verified backend payload injected into DOM only after successful order creation
        const purchaseDataScript = document.getElementById('pritha-meta-purchase-data');
        if (purchaseDataScript) {
            try {
                const payload = JSON.parse(purchaseDataScript.textContent || '{}');
                const orderId = payload.order_id ? String(payload.order_id) : '';
                const eventId = payload.event_id || ('purchase_' + orderId);

                if (orderId && eventId) {
                    const storageKey = 'pritha_meta_purchase_tracked_' + orderId;
                    if (!localStorage.getItem(storageKey)) {
                        localStorage.setItem(storageKey, String(Date.now()));

                        const quantity = payload.quantity ? parseInt(payload.quantity, 10) : 1;
                        const unitPrice = payload.unit_price ? parseFloat(payload.unit_price) : UNIT_PRICE;
                        const value = payload.value ? parseFloat(payload.value) : (unitPrice * quantity);

                        const purchaseData = {
                            content_ids: [payload.product_id || PRODUCT_ID],
                            content_name: payload.product_name || PRODUCT_NAME,
                            content_type: 'product',
                            contents: [
                                {
                                    id: payload.product_id || PRODUCT_ID,
                                    quantity: quantity,
                                    item_price: unitPrice,
                                },
                            ],
                            num_items: quantity,
                            value: value,
                            currency: payload.currency || CURRENCY,
                            order_id: orderId,
                        };

                        dispatchCanonicalEvent('Purchase', purchaseData, eventId);
                    }
                }
            } catch (err) {
                console.warn('Meta Purchase tracking payload parse error:', err);
            }
        }
    });
})();
