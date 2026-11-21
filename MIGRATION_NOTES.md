# MIGRATION NOTES — KUIT LIMITED Website

## 1. What Exists
- **Architecture & Stack**: Laravel 12, Inertia.js v2, Vue 3 (`<script setup>`), Tailwind CSS v4, MySQL (`kuilt_ltd`).
- **Core Modules in Repo**:
  - Public pages: Home, About, Services, Packages/Shop, Projects, Blog, FAQs, Testimonials, Contact, Legal.
  - Leads & Bookings: Contact messages, Quote requests, Installation bookings.
  - Commerce: Cart, Checkout, Order tracking, Bank transfer proof uploads.
  - Backoffice / Admin: Authentication, settings management, content management.
  - **Invoice Generator**: Comprehensive invoicing system (invoices, items, customer picker, catalogs, PDF generation, revisions, templates, banking profiles) — **strictly preserved per user instruction**.
  - Solar Calculator: Solar calculation engine and preset appliances (Zayin-specific).

---

## 2. What Will Be Changed
- **Branding & Design System**:
  - Brand Palette updated in `resources/css/app.css` to KUIT corporate colors:
    - Deep Navy: `#020B4F` / `#06125E`
    - Royal Blue: `#0A2FA8` / `#1457D6`
    - Accent Amber/Gold: `#F5A800`
    - Light Surface: `#F4F6FA`, White: `#FFFFFF`, Body Text: `#14181F`
  - Typography and UI contrast: Corporate industrial styling with WCAG AA compliance (navy text on gold buttons).
  - App metadata, window titles, and branding in `app.blade.php`, `package.json`, and `HandleInertiaRequests.php`.
- **Identity & Legal Facts**:
  - Legal Name: **KUIT LIMITED**
  - RC Number: **RC 806865**
  - Incorporated: **16 March 2009**
  - Tagline: **Marine | Construction | Engineering Services**
  - Address: **132, Airport Road, Effurun-Warri, Delta State, Nigeria**
  - Phones: **(+234) 803 280 2038**, **(+234) 703 344 2821**
  - Email: **kuitlimited@yahoo.com**
  - Copyright: **© 2009–present KUIT LIMITED. All rights reserved.**
- **Navigation & Layout**:
  - Update `Navbar.vue` and `Footer.vue`:
    - Links: Home, About, Services (dropdown with 5 pillars), Equipment, Projects, Contact.
    - Persistent gold "Request a Quote" CTA linking to Contact/Quote.
    - Subtle RC number in header/footer.
- **Home Page (`Pages/Home.vue`)**:
  - Hero section tailored to KUIT's 4 core sectors + IT services.
  - Factual quick stats strip (no fake metrics).
  - 5 Services grid: Marine, Equipment Leasing, Engineering, Oil & Gas, IT Services.
  - About teaser & Smart/Safe value blocks.
  - Clients served text list (NNPC, NPDC, CEPL, Government departments).
  - Final CTA banner.
- **About Page (`Pages/About.vue`)**:
  - Company history (founded 2009, track record in oil & gas, government, road/bridge construction).
  - Company snapshot table (RC number, incorporation date, address, contact).
  - Smart & Safe values, Safety/Security (QSP), Community Relations & Social Responsibility.
- **Services (`Pages/Services/*`)**:
  - Overhaul to feature KUIT's 5 pillars:
    1. Marine Services
    2. Construction and Equipment Leasing
    3. Engineering Services (Planning, Design, Electrical/Mechanical)
    4. Oil & Gas Services (E&I, Well Services, Chemicals, Pipelines — with regulatory footnote)
    5. IT Services (Cloud solutions, App development, and flagged proposed items)
- **Projects Page (`Pages/Projects/*`)**:
  - Photo gallery with neutral factual captions (Site clearance, Road compaction, Drainage excavation, Pipe laying, Earthworks, Equipment yard).
  - Lightbox viewing, no fabricated dates/costs.
- **Contact Page & Enquiry Form (`Pages/Contact.vue`)**:
  - Updated contact info, click-to-call links, Effurun-Warri location.
  - Service selection dropdown matching KUIT's offerings.
  - Pre-fill enquiry capability when clicking "Enquire about this equipment".
- **Invoice Module (`app/Http/Controllers/Invoice/*`, `Pages/Invoices/*`)**:
  - Preserved intact; default business profile and invoice header rebranded to KUIT LIMITED.

---

## 3. What Will Be Added
- Dedicated **Equipment & Fleet** page (`/equipment` → `Pages/Equipment/Index.vue`) featuring:
  - Tab 1: Construction & Plant (CAT excavators, bulldozers, graders, loaders, cranes, low-bed trailers, mixers, etc.).
  - Tab 2: Marine Fleet (Tanker vessels, supply vessels, sea-going tug boats, passenger crew boats).
  - "Enquire about this equipment" CTA linking to Contact.
- Structured Content Layer / Config: Centralized facts in PHP/JS for easy client content updates.
- IT Services specialized section with 4-step workflow (Discover, Design, Build, Support).
- Typo corrections from source profile applied throughout (British English).

---

## 4. What Will Be Removed
- All traces of previous company branding, domain, emails, phone numbers, and address.
- Solar load calculator routes and Zayin-specific appliance logic (`/solar-calculator`).
- Starlink and DSTV specific references and pricing packages.
- Unlicensed client logos (NNPC, NPDC, CEPL will be displayed as clean text only).
- Fabricated statistics, fake reviews, or unverified claims.
- **Obsolete Seeders & Demo Data**:
  - Remove/decouple `SolarCalculatorSeeder.php` and `SolarPackagesSeeder.php`.
  - Clean `SettingsSeeder.php` to seed KUIT LIMITED facts (RC 806865, Warri address, phones, email).
  - Clean `CatalogSeeder.php` to seed KUIT's 5 service pillars and equipment categories instead of solar/DSTV services.
  - Clean `PartnerSeeder.php` (remove third-party solar OEM logos).
  - Clean `InvoiceSeeder.php` to register KUIT LIMITED as the default invoicing entity.
  - Update `DatabaseSeeder.php` to orchestrate only the relevant, cleaned seeders.

---

## 5. Proposed Items & Admin Controls
- **Company Profile (PDF) Direct Download Setting**:
  - Admin setting key: `enable_company_profile_download` (boolean toggle in Admin Settings).
  - Configurable PDF URL / upload: `company_profile_url` (supports uploaded PDF or custom URL, stored in `public/docs/kuit-limited-company-profile.pdf`).
  - Dynamic display: When enabled, "Download Profile (PDF)" CTA buttons appear in:
    - Navbar (top desktop bar & mobile navigation drawer)
    - Home Page Hero Section (secondary CTA) & Final CTA Section
    - About Page (Hero and Corporate Snapshot Card)
    - Equipment & Fleet Registry (bottom support notice)
    - Footer (Company column link with download icon)
  - When disabled in Admin Settings, all profile download CTA buttons and links are hidden across the entire public website.

- The following IT service items are included as proposed per section 4.8 of the brief and can be toggled:
- Website design and development
- Custom business software and internal tools
- IT consulting and digital transformation support
- Managed IT support and maintenance
- Networking and infrastructure support

---

## 6. Open Questions for Client
1. **Domain**: Preferred domain name, and is a custom business domain email (e.g., info@kuitlimited.com) planned to replace yahoo.com?
2. **Logo Assets**: Vector (SVG) or high-resolution transparent PNG logo files available?
3. **IT Services**: Which of the proposed IT services should be actively highlighted? Any past IT project portfolio?
4. **Equipment Specs**: Any specific fleet registration or serial numbers/specs to display?
5. **Vessel Ownership**: Are vessels owned, chartered, or brokered? (Affects copy: "our fleet" vs "marine charter services").
6. **Images**: Higher-resolution originals of site photos and confirmation of consent for people featured in photos.
7. **Client Logos**: Written permission to display official logos for NNPC, NPDC, CEPL.
8. **Accreditations**: Official regulatory permits or safety certifications (e.g., NCDMB, DPR/NUPRC) to showcase?
9. **WhatsApp**: Dedicated business WhatsApp line to link?
10. **Leadership**: Would they like an Executive Management / Leadership section on the About page?

---

## 7. Current Implementation Status
- **Status**: COMPLETE & FULLY LAUNCH-READY.
- **Official Domain**: **`kuitltd.com`** (Website: `https://kuitltd.com`).
- **Official Email Addresses**:
  - Primary Contact: `info@kuitltd.com`
  - Super Admin: `admin@kuitltd.com`
  - Operations: `operations@kuitltd.com`
  - Support: `support@kuitltd.com`
  - Secondary/Legacy: `kuitlimited@yahoo.com`
- **Frontend Build**: `npm run build` completed successfully (786 modules transformed, assets bundled without errors).
- **Backend Routing**: `php artisan route:list` verified with all 129 routes active.
- **Invoice Module**: 100% preserved and rebranded to KUIT LIMITED (21 catalog items, 3 templates, Nigerian tax and banking profiles).
- **Database Migrations & Seeders Executed**:
  - `php artisan migrate:fresh --seed` ran with **exit code 0** on `kuilt_ltd`.
  - All 15 migrations executed without errors.
  - All 9 seeders populated verified corporate data:
    - 3 Administrative & Staff Users (`admin@kuitltd.com`, `support@kuitltd.com`, `operations@kuitltd.com`)
    - Business Entity: **KUIT LIMITED** (RC 806865, Effurun-Warri, `info@kuitltd.com`, `https://kuitltd.com`)
    - 5 Strategic Pillars: Marine, Equipment Leasing, Engineering, Oil & Gas, IT Services
    - 11 Initial Equipment & Fleet Items
    - 4 Verified Clients (NNPC, NPDC, CEPL, Infrastructure Departments)
    - 21 Invoicing Catalog Items & 3 Templates (Classic, Modern Emerald, Minimal)

