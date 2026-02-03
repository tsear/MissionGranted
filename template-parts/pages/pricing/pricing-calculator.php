<!-- Pricing Calculator Section -->
<section class="py-8 sm:py-16 bg-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:px-6">
        <div class="max-w-screen-md mx-auto text-center mb-8 lg:mb-12">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900">Build Your Plan</h2>
            <p class="font-light text-gray-500 sm:text-xl">Customize your MissionGranted subscription based on your organization's needs.</p>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="grid lg:grid-cols-5 gap-8">
                <!-- Calculator Inputs -->
                <div class="lg:col-span-3 space-y-8">
                    <!-- Base Platform -->
                    <div class="p-6 bg-gray-50 rounded-xl">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-lg font-semibold text-gray-900">Platform Access</h3>
                            <span class="text-sm font-medium px-3 py-1 rounded-full" style="background-color: rgba(1, 107, 166, 0.1); color: var(--color-brand-blue);">Included</span>
                        </div>
                        <p class="text-sm text-gray-500">Core grant management platform with compliance tools, budget tracking, and reporting.</p>
                    </div>
                    
                    <!-- User Seats Slider -->
                    <div class="p-6 bg-gray-50 rounded-xl">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">User Seats</h3>
                            <span id="seats-display" class="text-lg font-bold" style="color: var(--color-brand-blue);">5 users</span>
                        </div>
                        <input 
                            id="seats-slider" 
                            type="range" 
                            min="1" 
                            max="50" 
                            value="5" 
                            step="1"
                            class="w-full h-2 bg-gray-200 rounded-full appearance-none cursor-pointer"
                            style="accent-color: var(--color-brand-blue);"
                        >
                        <div class="flex justify-between text-xs text-gray-500 mt-2">
                            <span>1</span>
                            <span>10</span>
                            <span>25</span>
                            <span>50+</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-3">
                            <span id="seats-price-note">First 3 users included. Additional users at $XX/user/month.</span>
                        </p>
                    </div>
                    
                    <!-- Grant Volume Slider -->
                    <div class="p-6 bg-gray-50 rounded-xl">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Active Grants</h3>
                            <span id="grants-display" class="text-lg font-bold" style="color: var(--color-brand-blue);">10 grants</span>
                        </div>
                        <input 
                            id="grants-slider" 
                            type="range" 
                            min="1" 
                            max="100" 
                            value="10" 
                            step="1"
                            class="w-full h-2 bg-gray-200 rounded-full appearance-none cursor-pointer"
                            style="accent-color: var(--color-brand-blue);"
                        >
                        <div class="flex justify-between text-xs text-gray-500 mt-2">
                            <span>1</span>
                            <span>25</span>
                            <span>50</span>
                            <span>100+</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-3">
                            <span id="grants-price-note">First 5 grants included. Additional grants at $XX/grant/month.</span>
                        </p>
                    </div>
                    
                    <!-- Add-ons -->
                    <div class="p-6 bg-gray-50 rounded-xl">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Optional Add-ons</h3>
                        <div class="space-y-3">
                            <label class="flex items-center justify-between cursor-pointer">
                                <div class="flex items-center">
                                    <input type="checkbox" id="addon-api" class="w-4 h-4 rounded border-gray-300" style="accent-color: var(--color-brand-blue);">
                                    <span class="ml-3 text-sm font-medium text-gray-900">API Access</span>
                                </div>
                                <span class="text-sm text-gray-500">+$XX/mo</span>
                            </label>
                            <label class="flex items-center justify-between cursor-pointer">
                                <div class="flex items-center">
                                    <input type="checkbox" id="addon-sso" class="w-4 h-4 rounded border-gray-300" style="accent-color: var(--color-brand-blue);">
                                    <span class="ml-3 text-sm font-medium text-gray-900">SSO / SAML Integration</span>
                                </div>
                                <span class="text-sm text-gray-500">+$XX/mo</span>
                            </label>
                            <label class="flex items-center justify-between cursor-pointer">
                                <div class="flex items-center">
                                    <input type="checkbox" id="addon-training" class="w-4 h-4 rounded border-gray-300" style="accent-color: var(--color-brand-blue);">
                                    <span class="ml-3 text-sm font-medium text-gray-900">Dedicated Training & Onboarding</span>
                                </div>
                                <span class="text-sm text-gray-500">+$XX/mo</span>
                            </label>
                            <label class="flex items-center justify-between cursor-pointer">
                                <div class="flex items-center">
                                    <input type="checkbox" id="addon-support" class="w-4 h-4 rounded border-gray-300" style="accent-color: var(--color-brand-blue);">
                                    <span class="ml-3 text-sm font-medium text-gray-900">Priority Support SLA</span>
                                </div>
                                <span class="text-sm text-gray-500">+$XX/mo</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Price Summary Card -->
                <div class="lg:col-span-2">
                    <div class="sticky top-24 p-6 bg-gray-900 rounded-xl text-white">
                        <h3 class="text-lg font-semibold mb-6">Your Estimate</h3>
                        
                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Platform Base</span>
                                <span id="price-base">$XXX</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">User Seats (<span id="summary-seats">5</span>)</span>
                                <span id="price-seats">$XX</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Active Grants (<span id="summary-grants">10</span>)</span>
                                <span id="price-grants">$XX</span>
                            </div>
                            <div id="addons-summary" class="hidden">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Add-ons</span>
                                    <span id="price-addons">$0</span>
                                </div>
                            </div>
                            <div class="border-t border-gray-700 pt-4">
                                <div class="flex justify-between items-baseline">
                                    <span class="text-gray-400">Estimated Monthly</span>
                                    <div class="text-right">
                                        <span id="price-total" class="text-3xl font-bold">$XXX</span>
                                        <span class="text-gray-400 text-sm">/mo</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Annual Toggle -->
                        <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg mb-6">
                            <span class="text-sm">Pay annually</span>
                            <div class="flex items-center">
                                <span class="text-xs text-green-400 mr-2">Save 15%</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" id="annual-toggle" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                                </label>
                            </div>
                        </div>
                        
                        <a href="/contact?subject=Pricing+Quote" class="btn btn--primary btn--lg w-full justify-center mb-3">
                            Get Custom Quote
                        </a>
                        <a href="/contact" class="btn btn--outline btn--lg w-full justify-center" style="border-color: rgba(255,255,255,0.3); color: white;">
                            Talk to Sales
                        </a>
                        
                        <p class="text-xs text-gray-500 mt-4 text-center">
                            Prices shown are estimates. Final pricing based on contract terms.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
(function() {
    // =====================================================
    // PRICING CONFIGURATION - Update these values as needed
    // =====================================================
    const PRICING = {
        // Base platform fee (monthly)
        baseFee: 299,
        
        // User seat pricing
        seats: {
            includedSeats: 3,           // Number of seats included in base
            pricePerSeat: 25,           // Price per additional seat
            tierBreaks: [               // Optional: volume discounts
                { min: 10, discount: 0.10 },  // 10% off after 10 seats
                { min: 25, discount: 0.20 },  // 20% off after 25 seats
            ]
        },
        
        // Grant volume pricing
        grants: {
            includedGrants: 5,          // Grants included in base
            pricePerGrant: 15,          // Price per additional grant
            tierBreaks: [
                { min: 25, discount: 0.10 },
                { min: 50, discount: 0.20 },
            ]
        },
        
        // Add-ons (monthly)
        addons: {
            api: 99,
            sso: 149,
            training: 199,
            support: 249
        },
        
        // Annual discount
        annualDiscount: 0.15
    };
    // =====================================================
    
    // DOM Elements
    const seatsSlider = document.getElementById('seats-slider');
    const grantsSlider = document.getElementById('grants-slider');
    const seatsDisplay = document.getElementById('seats-display');
    const grantsDisplay = document.getElementById('grants-display');
    const summarySeats = document.getElementById('summary-seats');
    const summaryGrants = document.getElementById('summary-grants');
    const priceBase = document.getElementById('price-base');
    const priceSeats = document.getElementById('price-seats');
    const priceGrants = document.getElementById('price-grants');
    const priceAddons = document.getElementById('price-addons');
    const priceTotal = document.getElementById('price-total');
    const addonsSummary = document.getElementById('addons-summary');
    const annualToggle = document.getElementById('annual-toggle');
    
    const addonCheckboxes = {
        api: document.getElementById('addon-api'),
        sso: document.getElementById('addon-sso'),
        training: document.getElementById('addon-training'),
        support: document.getElementById('addon-support')
    };
    
    function calculatePrice() {
        const seats = parseInt(seatsSlider.value);
        const grants = parseInt(grantsSlider.value);
        const isAnnual = annualToggle.checked;
        
        // Base fee
        let baseCost = PRICING.baseFee;
        
        // Seats cost
        let seatsCost = 0;
        const extraSeats = Math.max(0, seats - PRICING.seats.includedSeats);
        if (extraSeats > 0) {
            let discount = 0;
            for (const tier of PRICING.seats.tierBreaks) {
                if (seats >= tier.min) discount = tier.discount;
            }
            seatsCost = extraSeats * PRICING.seats.pricePerSeat * (1 - discount);
        }
        
        // Grants cost
        let grantsCost = 0;
        const extraGrants = Math.max(0, grants - PRICING.grants.includedGrants);
        if (extraGrants > 0) {
            let discount = 0;
            for (const tier of PRICING.grants.tierBreaks) {
                if (grants >= tier.min) discount = tier.discount;
            }
            grantsCost = extraGrants * PRICING.grants.pricePerGrant * (1 - discount);
        }
        
        // Add-ons cost
        let addonsCost = 0;
        for (const [key, checkbox] of Object.entries(addonCheckboxes)) {
            if (checkbox && checkbox.checked) {
                addonsCost += PRICING.addons[key];
            }
        }
        
        // Total
        let monthlyTotal = baseCost + seatsCost + grantsCost + addonsCost;
        
        // Annual discount
        if (isAnnual) {
            monthlyTotal = monthlyTotal * (1 - PRICING.annualDiscount);
        }
        
        // Update displays
        seatsDisplay.textContent = seats + (seats === 1 ? ' user' : ' users');
        grantsDisplay.textContent = grants + (grants === 1 ? ' grant' : ' grants');
        summarySeats.textContent = seats;
        summaryGrants.textContent = grants;
        
        priceBase.textContent = '$' + baseCost.toFixed(0);
        priceSeats.textContent = seatsCost > 0 ? '$' + seatsCost.toFixed(0) : 'Included';
        priceGrants.textContent = grantsCost > 0 ? '$' + grantsCost.toFixed(0) : 'Included';
        
        if (addonsCost > 0) {
            addonsSummary.classList.remove('hidden');
            priceAddons.textContent = '$' + addonsCost.toFixed(0);
        } else {
            addonsSummary.classList.add('hidden');
        }
        
        priceTotal.textContent = '$' + Math.round(monthlyTotal);
    }
    
    // Event listeners
    if (seatsSlider) seatsSlider.addEventListener('input', calculatePrice);
    if (grantsSlider) grantsSlider.addEventListener('input', calculatePrice);
    if (annualToggle) annualToggle.addEventListener('change', calculatePrice);
    
    for (const checkbox of Object.values(addonCheckboxes)) {
        if (checkbox) checkbox.addEventListener('change', calculatePrice);
    }
    
    // Initial calculation
    calculatePrice();
})();
</script>
