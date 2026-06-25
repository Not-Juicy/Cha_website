# CHA Website

Single-page website for the **Cambodian Haemophilia Association** — a patient-led organization supporting people living with bleeding disorders across Cambodia.

## Stack

- Plain HTML, CSS, and JavaScript (no build step, no framework)
- Single self-contained `index.html` (all CSS and JS inlined)
- Google Fonts: Poppins
- Brand colors: CHA Blue `#0B1D6D`, Red `#E31E24`, Purple `#6A2C91`

## Project structure

```
.
├── index.html         # entire site (all CSS + JS inlined)
└── images/            # photographs, logo, and SVG illustrations
```

## Running locally

Open `index.html` directly in any modern browser — no server required.

For the cleanest experience (so fonts and image paths resolve correctly), serve the repo over HTTP:

```bash
# from the repo root
python -m http.server 8000
# then visit http://localhost:8000
```

## Sections

The page is a single scroll with anchored navigation:

1. **Home** — main hero, intro, impact stats
2. **About Us** — mission, history timeline, leadership team
3. **About Haemophilia** — what it is, types, symptoms, related disorders
4. **Become a Member** — registration form + benefits
5. **News & Activities** — campaigns, events, member dashboard
6. **Partners** — global partner logos
7. **Contact Us** — contact info + form

## Notes

- All headings use CHA Blue (`#0B1D6D`)
- The site is fully responsive (breakpoints at 540px, 720px, 900px)
- All form submissions are mocked (no backend) — wire `data-mock-form` to a real endpoint when ready
- Animations respect `prefers-reduced-motion`
