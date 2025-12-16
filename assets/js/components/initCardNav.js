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
                bgColor: "#0D0716",
                textColor: "#fff",
                links: [
                    { label: "Customers", href: "/", ariaLabel: "Our Customers" },
                    { label: "About MissionGranted", href: "/about", ariaLabel: "About MissionGranted" },
                    { label: "About Smart Grant Solutions", href: "https://smartgrantsolutions.com/", ariaLabel: "About Smart Grant Solutions" }
                ]
            },
            {
                label: "Solutions",
                href: "/solutions",
                bgColor: "#170D27",
                textColor: "#fff",
                links: [
                    { label: "For Nonprofits", href: "/solutions", ariaLabel: "Solutions for Nonprofits" },
                    { label: "For Funders", href: "/solutions", ariaLabel: "Solutions for Funders" },
                    { label: "For Government", href: "/solutions", ariaLabel: "Solutions for Government" }
                ]
            },
            {
                label: "Resources",
                href: "/resources",
                bgColor: "#1E1137", 
                textColor: "#fff",
                links: [
                    { label: "Find Partners", href: "/resources", ariaLabel: "Find Partners" },
                    { label: "Pricing and Billing", href: "/pricing", ariaLabel: "Pricing and Billing" },
                    { label: "Support", href: "/contact", ariaLabel: "Support" }
                ]
            },
            {
                label: "Contact",
                href: "/contact",
                bgColor: "#271E37", 
                textColor: "#fff",
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
                buttonBgColor="#111"
                buttonTextColor="#fff"
                ease="power3.out"
            />
        );
    });
}
