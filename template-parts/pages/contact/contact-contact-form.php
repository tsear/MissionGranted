<!-- Contact Form Section -->
<section class="py-8 sm:py-16 bg-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:px-6">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div>
                <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900">Get In Touch</h2>
                <p class="mb-8 font-light text-gray-500 sm:text-lg">Have questions about MissionGranted? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg text-white" style="background-color: var(--color-brand-blue);">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">Email</h4>
                            <p class="text-gray-500">info@smartgrantsolutions.com</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg text-white" style="background-color: var(--color-brand-blue);">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">Phone</h4>
                            <p class="text-gray-500">(555) 123-4567</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg text-white" style="background-color: var(--color-brand-blue);">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">Office</h4>
                            <p class="text-gray-500">Columbus, Ohio</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="p-6 bg-gray-50 rounded-lg lg:p-8">
                <form action="#" class="space-y-6" id="contact-form">
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label for="contact-first-name" class="block mb-2 text-sm font-medium text-gray-900">First Name <span class="text-red-500">*</span></label>
                            <input type="text" id="contact-first-name" name="first_name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:border-transparent block w-full p-3" style="--tw-ring-color: var(--color-brand-blue);" placeholder="John" required>
                        </div>
                        <div>
                            <label for="contact-last-name" class="block mb-2 text-sm font-medium text-gray-900">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" id="contact-last-name" name="last_name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:border-transparent block w-full p-3" style="--tw-ring-color: var(--color-brand-blue);" placeholder="Doe" required>
                        </div>
                    </div>
                    <div>
                        <label for="contact-email" class="block mb-2 text-sm font-medium text-gray-900">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="contact-email" name="email" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:border-transparent block w-full p-3" style="--tw-ring-color: var(--color-brand-blue);" placeholder="john@example.com" required>
                    </div>
                    <div>
                        <label for="contact-organization" class="block mb-2 text-sm font-medium text-gray-900">Organization</label>
                        <input type="text" id="contact-organization" name="organization" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:border-transparent block w-full p-3" style="--tw-ring-color: var(--color-brand-blue);" placeholder="Your organization name">
                    </div>
                    <div>
                        <label for="contact-subject" class="block mb-2 text-sm font-medium text-gray-900">Subject <span class="text-red-500">*</span></label>
                        <select id="contact-subject" name="subject" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:border-transparent block w-full p-3" style="--tw-ring-color: var(--color-brand-blue);" required>
                            <option value="">Select a topic</option>
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Pricing Quote">Pricing Quote</option>
                            <option value="Demo Request">Demo Request</option>
                            <option value="Technical Support">Technical Support</option>
                            <option value="Partnership">Partnership</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="contact-message" class="block mb-2 text-sm font-medium text-gray-900">Message <span class="text-red-500">*</span></label>
                        <textarea id="contact-message" name="message" rows="5" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:border-transparent block w-full p-3" style="--tw-ring-color: var(--color-brand-blue);" placeholder="How can we help you?" required></textarea>
                    </div>
                    <button type="submit" class="btn btn--primary btn--lg w-full justify-center">
                        Send Message
                    </button>
                    <p class="text-xs text-gray-500 text-center">We typically respond within 1 business day.</p>
                </form>
            </div>
        </div>
    </div>
</section>
