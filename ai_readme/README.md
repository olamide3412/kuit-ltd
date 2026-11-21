# KUIT Limited Website: Agent Brief

> **Read this whole file before touching any code.**
> This repository is an existing company-website codebase that has been cloned. Your job is to **re-skin and re-content it** into the official website of **KUIT Limited**, keeping the existing stack, structure and conventions wherever possible. Do not rewrite the project from scratch and do not swap frameworks.

---

## 0. How to work

1. **Discover first (no edits).** Inspect the repo: framework, package manager, routing, layout/components, styling system (Tailwind, CSS modules, theme file, etc.), content source (hardcoded, JSON, CMS, i18n files), forms, images, SEO setup, deployment config.
2. **Write a short plan** in `MIGRATION_NOTES.md` listing: what exists, what will be changed, what will be added, what will be removed.
3. **Implement** in small, logical commits (branding, then content, then new pages, then cleanup).
4. **Verify** with the acceptance checklist in section 12. Run the build, lint and tests that exist.
5. Prefer editing existing components and content files over creating parallel ones. Remove leftover content from the previous company entirely (names, logos, emails, phone numbers, addresses, testimonials, stats, lorem ipsum, placeholder images, metadata, `package.json` name/description, favicon, social tags, footer, legal text).

### Hard rules

- **Never invent facts.** No fake statistics, years of experience, project counts, client logos, awards, certifications, testimonials, team members or addresses. Only use information in this document. If something is missing, use a clearly marked `TODO` in `MIGRATION_NOTES.md` and keep the UI graceful (hide the section rather than show fake data).
- **No claims about certifications** (ISO, DPR, NCDMB, etc.) unless the client supplies them.
- **Client names** (NNPC, NPDC, CEPL) may be shown as plain text in a "Clients we have served" list only. **Do not use their logos** without written permission.
- Keep the copy professional, concise, and correct English. Fix the typos in the source profile (see section 6).
- Mobile-first, accessible, fast.

---

## 1. Company facts (source of truth)

| Field | Value |
|---|---|
| Legal name | **KUIT LIMITED** |
| RC number | **RC 806865** |
| Incorporated | **16 March 2009** |
| Tagline | **Marine | Construction | Engineering Services** |
| Address | 132, Airport Road, Effurun-Warri, Delta State, Nigeria |
| Phone | (+234) 803 280 2038, (+234) 703 344 2821 |
| Email | kuitlimited@yahoo.com |
| Website domain | TODO (ask client) |
| Footer line | © 2009 KUIT LIMITED. All rights reserved. (Use a dynamic current year only if the repo already does this; otherwise "© 2009–{current year}") |

**Positioning:** A Nigerian marine services, construction/equipment leasing and engineering company, serving the oil & gas industry and government, now also offering **IT services** (cloud solutions, app development and more).

---

## 2. Brand and design direction

Derived from the company logo and profile document.

- **Logo:** Script "Kuit" in white with "LIMITED" in spaced gold capitals on a deep blue background, with "RC 806865" above. Extract it from page 1 or 2 of `KUIT_Profile_With_Pipeline_Well_Photos.pdf`. If a clean transparent logo is not available, crop the logo from the PDF, and flag in `MIGRATION_NOTES.md` that a vector/transparent logo should be requested from the client.
- **Colour palette** (sample exact values from the logo, these are approximations):
  - Deep navy: `#020B4F` to `#06125E`
  - Royal blue: `#0A2FA8` to `#1457D6`
  - Accent amber/gold: `#F5A800`
  - White `#FFFFFF`, light grey surface `#F4F6FA`, body text `#14181F`
- Define these as design tokens (CSS variables or the repo's theme config), not scattered hex codes. Check text contrast (WCAG AA), especially gold on white, which should be used for accents and large text only. Use navy for text and buttons.
- **Look and feel:** Corporate, trustworthy, industrial. Navy hero sections with the signature curved/swoosh gradient motif from the cover, a gold call-to-action, generous white space, real photography. Avoid generic stock-tech visuals except in the IT section.
- **Typography:** Use whatever the repo already uses unless it clashes. A clean geometric sans for headings (e.g. similar to the profile's Futura-like headings) and a readable sans for body.
- **Imagery:** Use the photos from the PDF (see section 9). Never leave placeholder images.

---

## 3. Site map

Adapt the existing routes/pages to this structure. Reuse existing page templates where they fit.

```
/                     Home
/about                About Us (company story, Smart & Safe values)
/services             Services overview
  /services/marine
  /services/construction-equipment-leasing
  /services/engineering
  /services/oil-and-gas
  /services/it-services
/equipment            Equipment & fleet
/projects             Project gallery
/clients              (or a section on About/Home) Clients served
/safety               Safety, Security & Community (or a section on About)
/contact              Contact + enquiry form
```

If the repo is small, it is fine to combine pages (e.g. Safety and Community inside About; Clients on Home) but the Services, Equipment, Projects and Contact pages should exist. Navigation should include a persistent **"Request a Quote"** CTA linking to Contact.

---

## 4. Page-by-page content

### 4.1 Home

- **Hero:** Headline: *"Marine, Construction and Engineering Services You Can Rely On."* Sub-headline: *"KUIT LIMITED delivers equipment leasing, marine services, engineering and oil & gas support across Nigeria, and now technology solutions for modern businesses."* Buttons: **Request a Quote** (primary, gold), **View Our Services** (secondary). Show "RC 806865" subtly.
- **Quick stats strip:** Only factual items: *"Incorporated 2009"*, *"Marine | Construction | Engineering | IT"*, *"Serving Oil & Gas and Government"*. **No invented numbers.**
- **Services grid (5 cards):** Marine Services, Construction & Equipment Leasing, Engineering, Oil & Gas Services, IT Services. Each has an icon, one-line summary, and a "Learn more" link.
- **About teaser:** Short paragraph from section 4.2, link to About.
- **Why KUIT (Smart / Safe / Reliable):** Based on the profile's "Smart" and "Safe" statements (section 4.9).
- **Featured equipment/marine photo band.**
- **Clients served:** Text list: Nigerian National Petroleum Company (NNPC), Nigerian Petroleum Development Company (NPDC), Century Exploration and Production Limited (CEPL), plus various government departments (roads and bridges).
- **CTA banner:** "Need equipment, a vessel or an engineering partner? Talk to us."

### 4.2 About

> KUIT LIMITED was incorporated on 16 March 2009 and has since delivered high-quality services to uncompromising standards. As a marine services and construction/equipment leasing company, we specialise in leasing and contract services across marine, construction, engineering and oil & gas support.
>
> Over the years we have served the oil and gas industry and various government departments, both locally and internationally, including the Nigerian National Petroleum Company (NNPC), the Nigerian Petroleum Development Company (NPDC) and Century Exploration and Production Limited (CEPL), as well as road and bridge construction projects across Nigeria. Our excavators and other equipment are currently at work in various locations around the country.
>
> We have recently expanded into technology, offering IT services including cloud solutions and application development.

Include: company snapshot table (legal name, RC number, incorporated date, location, contact), and the **Smart** and **Safe** value blocks.

### 4.3 Services overview

Intro: *"KUIT LIMITED provides leasing, construction, engineering, marine, oil & gas and IT services, delivered by qualified personnel and project partners in line with project requirements."*

### 4.4 Marine Services

- Tanker vessels
- Supply vessels
- Sea-going tug boats
- Passenger crew boats

Photos: crew boat, tug, supply vessel, tanker (from the PDF).

### 4.5 Construction and Equipment Leasing (Rentals)

- Excavators (CAT 330, CAT 320, CAT 325)
- Low-bed trailers
- 950 pay-loader (wheel loader)
- D6 and D8 bulldozers
- Swamp buggy
- 60-ton forklift
- 140G CAT graders
- Concrete mixers
- 400 Amp welding machines
- Compressors
- 60 to 100-ton cranes

Also: construction projects and road/bridge works, demolition and site clearance, drainage works (supported by the project photos). Include an **"Enquire about this equipment"** button that pre-fills the contact form subject.

### 4.6 Engineering Services

**Planning, Design and Engineering**
- Infrastructure planning and design
- Project planning and engineering
- Materials procurement and supply

**Electrical / Mechanical Engineering**
- Electrical works and erection of support structures
- Mechanical instrumentation and transportation
- Materials procurement and supply

### 4.7 Oil & Gas Services (Additional)

Intro: *"Specialised technical, field and supply support for energy-sector projects."*

**Electrical and Instrumentation (E&I)**
- Robertshaw control panel maintenance and servicing
- Instrumentation inspection, calibration and troubleshooting
- Control systems, electrical panels and field-device maintenance

**Well Services**
- Well clean-up and post-intervention support
- Well stimulation and related field support services
- Flowback support, testing and production optimisation assistance

**Oilfield Chemical Supply**
- Procurement and supply of oilfield and production chemicals
- Drilling, completion, treatment and maintenance chemicals
- Chemical logistics and project-specific material sourcing

**Pipeline and Flowline Construction**
- Onshore and offshore pipeline/flowline installation support
- Pipe fabrication, welding, laying and associated civil works
- Pipeline repairs, maintenance and testing support

Required footnote on this page: *"Services are delivered in accordance with applicable project requirements and through appropriately qualified personnel and project partners where required."*

### 4.8 IT Services (NEW. Not in the PDF, provided verbally by the client)

The client said they also offer **IT services such as cloud solutions, app development, etc.** Build this page with the following. Mark everything beyond the two confirmed items as **proposed** in `MIGRATION_NOTES.md` so the client can confirm or remove them before launch.

Confirmed:
- **Cloud solutions** (cloud setup and migration, hosting, storage and backup)
- **App development** (web and mobile applications)

Proposed (client to confirm, easy to toggle off in the content file):
- Website design and development
- Custom business software and internal tools
- IT consulting and digital transformation support
- Managed IT support and maintenance
- Networking and infrastructure support

Page structure: hero ("Technology solutions that keep your business moving"), service cards, a simple 4-step "How we work" (Discover, Design, Build, Support), and a CTA ("Discuss your IT project"). Keep the tone consistent with the rest of the site (practical, not buzzword-heavy). Do not claim partnerships (AWS, Microsoft, Google) or certifications.

### 4.9 Smart and Safe (cleaned copy)

**Smart.** KUIT LIMITED is at the forefront of industry performance, maintaining high standards of excellence with international reach, practicality and innovation. We deploy modern technology, and our productive capacity has global appeal.

**Safe.** KUIT LIMITED allows no compromise on safety. We use up-to-date systems, leadership techniques, training and support to manage all stakeholders. We provide health and wellbeing programmes for the long run, and work proactively with customers and relevant parties to eliminate risk through design, development and the construction process. We enforce our rules and foster a positive safety culture.

**Safety and Security.** Qualified safety personnel (QSP) are deployed to site to ensure appropriate action is taken as required.

**Community Relations and Social Responsibility.** Where applicable, we maintain peaceful and responsible relations with host communities.

### 4.10 Equipment

Two tabs or sections: **Construction and Plant** and **Marine Fleet**, listing items from sections 4.4 and 4.5, each with a photo where available. Add a "Request this equipment" CTA. Do not show prices or availability.

### 4.11 Projects

Photo gallery (lightbox) using the project photos from the PDF (building demolition and site clearance, road compaction/rolling, drainage channel excavation, equipment yard, earthworks and bulldozer on sand-filling site, pipe-laying trench). Use neutral captions such as *"Site clearance and demolition"*, *"Road construction and compaction"*, *"Drainage channel excavation"*, *"Pipe laying"*, *"Earthworks and sand filling"*, *"Equipment yard"*. **Do not add project names, locations, dates or clients to captions** (not supplied).

### 4.12 Contact

- Address, both phone numbers (click-to-call `tel:` links, one WhatsApp link only if the client confirms a WhatsApp number), email (`mailto:`).
- **Enquiry form** with fields: name, company, email, phone, service of interest (select: Marine, Equipment Leasing, Engineering, Oil & Gas, IT Services, Other), message. Include honeypot spam protection and client and server validation.
- If the repo already has a form handler, reuse it, pointing the recipient to `kuitlimited@yahoo.com`. If not, implement the simplest option that fits the stack (e.g. a serverless function or an email-service integration with env-based keys) and document the env variables in `.env.example`. **Never commit secrets.**
- Embedded map of Effurun-Warri (Airport Road): use a privacy-friendly link or embed; verify the exact pin with the client.

---

## 5. Global components

- **Header:** Logo, nav (Home, About, Services, Equipment, Projects, Contact), gold "Request a Quote" button. Sticky, mobile menu.
- **Footer:** Logo and RC number, short description, quick links, services list, contact details, "© 2009 KUIT LIMITED. All rights reserved."
- **Top bar (optional):** Phone and email.
- **Floating call/WhatsApp button** on mobile (only if numbers are verified).

---

## 6. Copy corrections to apply (source PDF has errors)

| Source text | Use instead |
|---|---|
| "specializes" (with "we") | "specialise" (use British/Nigerian English consistently) |
| "Clientels" | "Clients" |
| "Evidence Job Done" | "Our Track Record" / "Clients We Have Served" |
| "we have over the years received the Oil & Gas Industry…" | "we have over the years served…" |
| "Nigeria Petroleum Development Co-operation (NPDC)" | "Nigerian Petroleum Development Company (NPDC)" |
| "allows no comprise of safety" | "allows no compromise on safety" |
| "Pay-loader", "Equipments", "Personnels" | "Pay loader / wheel loader", "equipment", "personnel" |
| Unclosed bracket "(330, 320, Low-bed trailers…" | List excavators (CAT 330, 320, 325) separately from trailers |
| "Quality Safety Personnels (QSP)" | "Qualified safety personnel (QSP)" (confirm meaning with client) |

Use **British English** throughout (specialise, optimisation) as is standard in Nigeria.

---

## 7. SEO and metadata

- Site title: `KUIT LIMITED | Marine, Construction and Engineering Services in Nigeria`
- Meta description: *"KUIT LIMITED (RC 806865) provides marine services, construction equipment leasing, engineering, oil & gas support and IT solutions from Effurun-Warri, Delta State, Nigeria."*
- Unique `<title>` and description per page, canonical URLs, Open Graph and Twitter cards (use a branded OG image built from the logo).
- Add `Organization` / `LocalBusiness` JSON-LD with the facts in section 1 only. Include `sitemap.xml` and `robots.txt` if the stack supports it.
- Keywords to reflect naturally in copy: equipment leasing Warri, excavator hire Delta State, marine vessel charter Nigeria, oil and gas services Nigeria, pipeline construction, oilfield chemicals supply, cloud solutions Nigeria, app development Warri.
- All images need meaningful `alt` text.

---

## 8. Accessibility and performance

- Semantic HTML, one `h1` per page, keyboard-navigable menu and lightbox, visible focus states, form labels and error messages.
- Compress and resize images (WebP/AVIF if supported by the stack), lazy-load below the fold, set width/height to avoid layout shift.
- Respect `prefers-reduced-motion`. Keep animations subtle.
- Target Lighthouse 90+ in each category where practical.

---

## 9. Assets: extracting images from the PDF

The client's PDF is `KUIT_Profile_With_Pipeline_Well_Photos.pdf` (place it in the repo root or a temporary folder, and **do not commit it to the public folder**).

```bash
# Option A (poppler)
mkdir -p assets-raw && pdfimages -all KUIT_Profile_With_Pipeline_Well_Photos.pdf assets-raw/img

# Option B (PyMuPDF)
python - <<'EOF'
import fitz, os
os.makedirs("assets-raw", exist_ok=True)
doc = fitz.open("KUIT_Profile_With_Pipeline_Well_Photos.pdf")
for i, page in enumerate(doc):
    for j, img in enumerate(page.get_images(full=True)):
        pix = fitz.Pixmap(doc, img[0])
        if pix.n > 4: pix = fitz.Pixmap(fitz.csRGB, pix)
        pix.save(f"assets-raw/p{i+1}_{j+1}.png")
EOF
```

Then review the extracted images, discard backgrounds/gradients/duplicates, and rename into the repo's image directory with clear names, for example:

| Image (PDF page) | Suggested file |
|---|---|
| Red tanker vessel (p3, p12) | `marine-tanker.webp` |
| Yellow CAT excavator on soil (p3, p12) | `equipment-excavator.webp` |
| Green/white crew boat "Pelican Calm" (p8) | `marine-crew-boat.webp` |
| Blue tug boat (p8) | `marine-tug.webp` |
| Orange supply vessel (p8) | `marine-supply-vessel.webp` |
| Pipe laying in trench (p8) | `project-pipe-laying.webp` |
| Concrete mixer (p8) | `equipment-mixer.webp` |
| Graders in a yard (p8) | `equipment-graders.webp` |
| Wellhead / valve work (p8) | `oilgas-wellhead.webp` |
| Wheel loader and trucks at quarry (p8) | `equipment-loader-trucks.webp` |
| Demolition and site clearance (p10) | `project-demolition-1.webp`, `-2.webp`, `-3.webp` |
| Road compaction (p10) | `project-road-compaction.webp` |
| Equipment yards (p10) | `equipment-yard-1.webp`, `-2.webp` |
| Drainage excavation (p10) | `project-drainage.webp` |
| Earthworks / sand filling (p10) | `project-earthworks.webp` |
| Logo (p1/p2) | `logo.png` (+ `logo-white.png`, `favicon`) |

**Image caveats to note in `MIGRATION_NOTES.md`:** some images may be low-resolution or may be stock/third-party photos (a few vessel images appear to be generic marine photos). Ask the client to confirm they own the rights and to supply higher-resolution originals. Some project photos show people, and the client should confirm consent for public use. Do not upscale artificially; instead, use them at sensible sizes with good cropping.

Generate a favicon and app icons from the logo's "K" mark.

---

## 10. Content architecture

If the repo supports it, move all copy into a single content layer (JSON/TS/MDX/i18n file) so the client can edit text without touching components. Suggested shape:

```ts
export const company = {
  name: "KUIT LIMITED",
  rc: "RC 806865",
  incorporated: "16 March 2009",
  tagline: "Marine | Construction | Engineering Services",
  address: "132, Airport Road, Effurun-Warri, Delta State, Nigeria",
  phones: ["+234 803 280 2038", "+234 703 344 2821"],
  email: "kuitlimited@yahoo.com",
};
// services[], equipment[], projects[], clients[], values[]
```

Follow whatever pattern the repo already uses if it differs.

---

## 11. Cleanup and housekeeping

- Update `package.json` (name, description), `README` (replace this brief with a short real project README once done, and keep this brief as `docs/AGENT_BRIEF.md`), page titles, manifest, favicon, OG images, license/copyright, analytics IDs (remove old ones, leave a placeholder env var for the new one).
- Search the entire repo (code, content, config, comments, images, `public/`, `.env*`) for the previous company's name, domain, emails, phone numbers and brand colours, and remove every instance.
- Remove unused pages, components, dependencies and assets.
- Add `.env.example` documenting every environment variable.
- Ensure `npm run build` (or the repo's equivalent), lint and type-check pass with no errors.

---

## 12. Acceptance checklist

- [ ] No trace of the previous company's branding or data remains.
- [ ] Logo, favicon, colours and typography match KUIT's brand.
- [ ] All pages in section 3 exist, with content from section 4, typo-corrected per section 6.
- [ ] IT Services page exists, with proposed items flagged for client confirmation.
- [ ] Contact details are correct everywhere (header, footer, contact page, JSON-LD), with working `tel:` and `mailto:` links.
- [ ] Contact form validates, submits, and delivers to `kuitlimited@yahoo.com` (or a documented stub if credentials are pending).
- [ ] Every image is real, optimised, has alt text, and no unlicensed client logos are used.
- [ ] No invented statistics, certifications, testimonials or project details.
- [ ] Responsive at 360px, 768px and 1280px+. Keyboard accessible. Good contrast.
- [ ] SEO metadata, sitemap and structured data in place.
- [ ] Build, lint and type-check pass. `MIGRATION_NOTES.md` lists changes and open TODOs.

---

## 13. Open questions for the client (list these in `MIGRATION_NOTES.md`)

1. Preferred domain name, and is a business email address (not Yahoo) planned?
2. Vector or high-resolution logo files?
3. Which proposed IT services are actually offered? Any IT portfolio or past IT projects?
4. Confirmation of the full list of excavator and equipment models, and whether prices or availability should be shown.
5. Do they own the vessels, or are they chartered or brokered? (Affects wording: "our fleet" vs "marine services".)
6. Rights and consent for the photos. Higher-resolution originals?
7. Permission to display client names/logos (NNPC, NPDC, CEPL).
8. Any certifications, registrations or safety accreditations they can legitimately show?
9. A WhatsApp number? Social media accounts (LinkedIn, Facebook, Instagram)?
10. Exact meaning of "QSP" and the preferred wording for the community-relations statement.
11. Leadership or team information, if they want an "Our Team" section.
