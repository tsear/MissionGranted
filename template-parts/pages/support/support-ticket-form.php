<section id="submit-ticket" class="bg-gray-50 dark:bg-gray-800">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="max-w-3xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center items-center mb-4 w-16 h-16 rounded-full bg-blue-100 lg:h-20 lg:w-20 dark:bg-blue-900 mx-auto">
                    <svg class="w-8 h-8 text-blue-600 lg:w-10 lg:h-10 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                    </svg>
                </div>
                <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 dark:text-white">Submit a Support Ticket</h2>
                <p class="text-gray-500 dark:text-gray-400 max-w-xl mx-auto">Have a technical issue or question? Submit a ticket and our support team will respond within 24 hours.</p>
            </div>
            
            <!-- Ticket Form Card -->
            <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg p-6 sm:p-8">
                <!-- HubSpot Form Embed Placeholder -->
                <!-- Replace this div with your HubSpot form embed code -->
                <div id="hubspot-ticket-form">
                    <!-- 
                    To integrate HubSpot:
                    1. Go to HubSpot > Marketing > Forms > Create Form
                    2. Add fields: Name, Email, Subject, Issue Type (dropdown), Description
                    3. Set up workflow to create ticket on submission
                    4. Get embed code and paste below
                    
                    Example embed:
                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
                    <script>
                        hbspt.forms.create({
                            region: "na1",
                            portalId: "YOUR_PORTAL_ID",
                            formId: "YOUR_FORM_ID"
                        });
                    </script>
                    -->
                    
                    <!-- Fallback Form (displays until HubSpot is configured) -->
                    <form class="space-y-6" action="/contact" method="get">
                        <div class="grid gap-6 sm:grid-cols-2">
                            <div>
                                <label for="ticket-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                                <input type="text" id="ticket-name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="John Doe" required>
                            </div>
                            <div>
                                <label for="ticket-email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
                                <input type="email" id="ticket-email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="you@organization.org" required>
                            </div>
                        </div>
                        
                        <div class="grid gap-6 sm:grid-cols-2">
                            <div>
                                <label for="ticket-type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Issue Type</label>
                                <select id="ticket-type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                    <option value="">Select an issue type</option>
                                    <option value="technical">Technical Issue</option>
                                    <option value="account">Account & Billing</option>
                                    <option value="feature">Feature Request</option>
                                    <option value="training">Training & Onboarding</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="ticket-priority" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Priority</label>
                                <select id="ticket-priority" name="priority" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                    <option value="low">Low - General question</option>
                                    <option value="medium" selected>Medium - Need help soon</option>
                                    <option value="high">High - Affecting my work</option>
                                    <option value="urgent">Urgent - System down</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label for="ticket-subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                            <input type="text" id="ticket-subject" name="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Brief description of your issue" required>
                        </div>
                        
                        <div>
                            <label for="ticket-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea id="ticket-description" name="description" rows="5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Please describe your issue in detail. Include any error messages, steps to reproduce, and what you've already tried." required></textarea>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                Typical response time: within 24 hours
                            </p>
                            <button type="submit" class="btn btn--primary">
                                Submit Ticket
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Alternative Contact Options -->
                <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <p class="text-sm text-gray-500 dark:text-gray-400 text-center mb-4">Need immediate assistance?</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="mailto:support@missiongranted.org" class="inline-flex items-center justify-center text-sm text-blue-600 hover:underline dark:text-blue-400">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                            Email Support
                        </a>
                        <a href="https://www.reddit.com/r/MissionGranted/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center text-sm text-blue-600 hover:underline dark:text-blue-400">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .716-.435 1.333-1.01 1.614a3.111 3.111 0 0 1 .042.52c0 2.694-3.13 4.87-7.004 4.87-3.874 0-7.004-2.176-7.004-4.87 0-.183.015-.366.043-.534A1.748 1.748 0 0 1 4.028 12c0-.968.786-1.754 1.754-1.754.463 0 .898.196 1.207.49 1.207-.883 2.878-1.43 4.744-1.487l.885-4.182a.342.342 0 0 1 .14-.197.35.35 0 0 1 .238-.042l2.906.617a1.214 1.214 0 0 1 1.108-.701z"/></svg>
                            Ask the Community
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
