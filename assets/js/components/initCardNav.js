/**
 * Initialize React CardNav Component
 *
 * @package MissionGranted
 * @since 1.0.0
 */

import React from 'react';
import { createRoot } from 'react-dom/client';
import CardNav from './CardNav.jsx';

export function initCardNav() {
    document.addEventListener('DOMContentLoaded', () => {
        const navRoot = document.getElementById('card-nav-root');
        if (!navRoot) return;

        const themeUrl = window.missionGrantedData?.themeUrl || '';
        const root = createRoot(navRoot);
        
        const items = [
            {
                label: "Home",
                href: "/",
                bgColor: "#fff",
                textColor: "#000",
                links: [
                    { label: "Customers", href: "/customers", ariaLabel: "Our Customers" },
                    { label: "About MissionGranted", href: "/about-missiongranted", ariaLabel: "About MissionGranted" },
                    { label: "About Smart Grant Solutions", href: "https://smartgrantsolutions.com/", ariaLabel: "About Smart Grant Solutions" }
                ]
            },
            {
                label: "Solutions",
                href: "/solutions",
                bgColor: "#fff",
                textColor: "#000",
                links: [
                    { label: "For Nonprofits", href: "/for-nonprofits", ariaLabel: "Solutions for Nonprofits" },
                    { label: "For Local Government", href: "/for-local-government", ariaLabel: "Solutions for Local Government" },
                    { label: "For Funders", href: "/for-funders", ariaLabel: "Solutions for Funders" }
                ]
            },
            {
                label: "Resources",
                href: "/resources",
                bgColor: "#fff", 
                textColor: "#000",
                links: [
                    { label: "Find Partners", href: "/find-partners", ariaLabel: "Find Partners" },
                    { label: "Pricing & Billing", href: "/pricing-billing", ariaLabel: "Pricing and Billing" },
                    { label: "Support", href: "/support", ariaLabel: "Support" }
                ]
            },
            {
                label: "Contact",
                href: "/contact",
                bgColor: "#fff", 
                textColor: "#000",
                links: [
                    { label: "Get in Touch", href: "/contact", ariaLabel: "Contact us" },
                    { label: "Sign In", href: "/wp-login.php", ariaLabel: "Sign In" }
                ]
            }
        ];

        root.render(
            <CardNav
                logo={`${themeUrl}/assets/images/MissionGranted small.png`}
                logoAlt="Mission Granted"
                items={items}
                baseColor="#fff"
                menuColor="#000"
                buttonBgColor="#4169E1"
                buttonTextColor="#fff"
                ease="power3.out"
            />
        );
    });
}
