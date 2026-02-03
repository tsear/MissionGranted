<!-- Pricing FAQ Section -->
<section class="py-8 sm:py-16 bg-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:px-6">
        <div class="max-w-screen-md mx-auto text-center mb-8 lg:mb-12">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900">Frequently Asked Questions</h2>
            <p class="font-light text-gray-500 sm:text-xl">Common questions about pricing, billing, and getting started.</p>
        </div>
        
        <div class="max-w-3xl mx-auto">
            <div class="space-y-4" id="pricing-faq">
                <!-- Question 1 -->
                <div class="border border-gray-200 rounded-lg">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-900 bg-white rounded-lg hover:bg-gray-50" onclick="toggleFaq(this)">
                        <span>Is there a free trial?</span>
                        <svg class="w-5 h-5 shrink-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="hidden p-5 pt-0">
                        <p class="text-gray-500">Yes! We offer a 14-day free trial on all plans. No credit card required to start. You'll have full access to all features included in your selected plan.</p>
                    </div>
                </div>
                
                <!-- Question 2 -->
                <div class="border border-gray-200 rounded-lg">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-900 bg-white rounded-lg hover:bg-gray-50" onclick="toggleFaq(this)">
                        <span>Can I change plans later?</span>
                        <svg class="w-5 h-5 shrink-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="hidden p-5 pt-0">
                        <p class="text-gray-500">Absolutely. You can upgrade or downgrade your plan at any time. When upgrading, you'll be prorated for the remainder of your billing cycle. Downgrades take effect at the start of your next billing period.</p>
                    </div>
                </div>
                
                <!-- Question 3 -->
                <div class="border border-gray-200 rounded-lg">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-900 bg-white rounded-lg hover:bg-gray-50" onclick="toggleFaq(this)">
                        <span>What payment methods do you accept?</span>
                        <svg class="w-5 h-5 shrink-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="hidden p-5 pt-0">
                        <p class="text-gray-500">We accept all major credit cards (Visa, Mastercard, American Express) and ACH bank transfers. Enterprise customers can also pay via invoice with NET-30 terms.</p>
                    </div>
                </div>
                
                <!-- Question 4 -->
                <div class="border border-gray-200 rounded-lg">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-900 bg-white rounded-lg hover:bg-gray-50" onclick="toggleFaq(this)">
                        <span>Do you offer discounts for nonprofits?</span>
                        <svg class="w-5 h-5 shrink-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="hidden p-5 pt-0">
                        <p class="text-gray-500">MissionGranted is built specifically for grant-funded organizations, and our pricing already reflects that focus. We offer additional discounts for annual commitments (15% off) and for organizations managing large grant portfolios.</p>
                    </div>
                </div>
                
                <!-- Question 5 -->
                <div class="border border-gray-200 rounded-lg">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-900 bg-white rounded-lg hover:bg-gray-50" onclick="toggleFaq(this)">
                        <span>What's included in the implementation?</span>
                        <svg class="w-5 h-5 shrink-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="hidden p-5 pt-0">
                        <p class="text-gray-500">All plans include self-service onboarding with video tutorials and documentation. Professional and Enterprise plans include live onboarding sessions. Enterprise customers receive dedicated implementation support with data migration assistance.</p>
                    </div>
                </div>
                
                <!-- Question 6 -->
                <div class="border border-gray-200 rounded-lg">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-900 bg-white rounded-lg hover:bg-gray-50" onclick="toggleFaq(this)">
                        <span>Is my data secure?</span>
                        <svg class="w-5 h-5 shrink-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="hidden p-5 pt-0">
                        <p class="text-gray-500">Yes. MissionGranted uses bank-level encryption (AES-256), is SOC 2 Type II compliant, and hosted on secure cloud infrastructure. We perform regular security audits and penetration testing. Your grant data is backed up daily with point-in-time recovery.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function toggleFaq(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('svg');
    
    content.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
}
</script>
