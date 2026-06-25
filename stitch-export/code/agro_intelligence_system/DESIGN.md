---
name: Agro-Intelligence System
colors:
  surface: '#fcf9f8'
  surface-dim: '#dcd9d9'
  surface-bright: '#fcf9f8'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f6f3f2'
  surface-container: '#f0eded'
  surface-container-high: '#eae7e7'
  surface-container-highest: '#e5e2e1'
  on-surface: '#1b1b1c'
  on-surface-variant: '#41493e'
  inverse-surface: '#303030'
  inverse-on-surface: '#f3f0ef'
  outline: '#717a6d'
  outline-variant: '#c0c9bb'
  surface-tint: '#2a6b2c'
  primary: '#00450d'
  on-primary: '#ffffff'
  primary-container: '#1b5e20'
  on-primary-container: '#90d689'
  inverse-primary: '#91d78a'
  secondary: '#835400'
  on-secondary: '#ffffff'
  secondary-container: '#fcab28'
  on-secondary-container: '#694300'
  tertiary: '#00460e'
  on-tertiary: '#ffffff'
  tertiary-container: '#006017'
  on-tertiary-container: '#77db76'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#acf4a4'
  primary-fixed-dim: '#91d78a'
  on-primary-fixed: '#002203'
  on-primary-fixed-variant: '#0c5216'
  secondary-fixed: '#ffddb5'
  secondary-fixed-dim: '#ffb957'
  on-secondary-fixed: '#2a1800'
  on-secondary-fixed-variant: '#643f00'
  tertiary-fixed: '#94f990'
  tertiary-fixed-dim: '#78dc77'
  on-tertiary-fixed: '#002204'
  on-tertiary-fixed-variant: '#005313'
  background: '#fcf9f8'
  on-background: '#1b1b1c'
  surface-variant: '#e5e2e1'
typography:
  display-lg:
    fontFamily: Inter
    fontSize: 32px
    fontWeight: '700'
    lineHeight: 40px
    letterSpacing: -0.02em
  headline-lg:
    fontFamily: Inter
    fontSize: 24px
    fontWeight: '600'
    lineHeight: 32px
  headline-md:
    fontFamily: Inter
    fontSize: 20px
    fontWeight: '600'
    lineHeight: 28px
  title-lg:
    fontFamily: Inter
    fontSize: 18px
    fontWeight: '600'
    lineHeight: 24px
  body-lg:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  body-md:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '400'
    lineHeight: 20px
  label-lg:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '600'
    lineHeight: 20px
    letterSpacing: 0.1px
  label-md:
    fontFamily: Inter
    fontSize: 12px
    fontWeight: '500'
    lineHeight: 16px
  headline-lg-mobile:
    fontFamily: Inter
    fontSize: 22px
    fontWeight: '600'
    lineHeight: 28px
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  unit: 8px
  xs: 4px
  sm: 8px
  md: 16px
  lg: 24px
  xl: 32px
  container-padding: 16px
  card-gap: 12px
---

## Brand & Style

The design system is engineered for the intersection of agricultural heritage and high-tech financial intelligence. It targets farmers, millers, and traders who require immediate, actionable data to make critical livelihood decisions. 

The aesthetic is **Corporate / Modern** with a focus on high-legibility and "big-tap" ergonomics. It utilizes a refined fintech dashboard language: clean white surfaces, purposeful use of green to signify growth and stability, and gold accents to evoke the value of the harvest. The interface prioritizes clarity over ornamentation, ensuring that even on low-end devices, the UI feels fast, responsive, and authoritative.

## Colors

The palette is rooted in the "Deep Green" of a healthy rice crop, providing a sense of trust and established expertise. "Rice Gold" is used sparingly for premium features, insights, or highlighting value-driven data (like high market prices).

- **Primary Green (#1B5E20):** Used for top app bars, primary actions, and branding.
- **Fresh Green (#4CAF50):** Used for positive trends, active states, and "Good" market conditions.
- **Rice Gold (#F9A825):** Used for advisory highlights, AI insights, and "Premium" status indicators.
- **Surface Strategy:** In light mode, use the Soft Yellow accent-surface for subtle banners or background sections to differentiate content from the pure white cards.

## Typography

This design system uses **Inter** for its exceptional legibility at small sizes on mobile screens. 

- **Readability First:** Headlines use semi-bold weights to ensure clear hierarchy against dense data tables or price lists.
- **Data Display:** Use `title-lg` for primary currency or price figures to make them immediately scannable.
- **Contextual Labels:** Use `label-md` for secondary metadata (e.g., "Last updated 2h ago") in the Muted Text color to keep the focus on the primary data.

## Layout & Spacing

The layout follows a strict **8dp grid system** to ensure visual harmony and ease of development. 

- **Fluid Grid:** Content primarily uses a fluid 4-column layout on mobile, expanding to 12 columns on tablet/desktop.
- **Touch Targets:** Minimum touch target size is 48x48px for all interactive elements, regardless of visual size.
- **Padding:** Use `md` (16px) for standard screen margins. Use `lg` (24px) for vertical spacing between major sections (e.g., Market Overview vs. AI Advisory).
- **Mobile Density:** On lower-end devices, keep margins consistent but allow cards to extend full-width with a 1px border if screen real estate is extremely limited.

## Elevation & Depth

Hierarchy is established through **Tonal Layers** and extremely **Subtle Shadows**.

- **Cards:** Use a soft, diffused shadow (`Y: 2, Blur: 8, Opacity: 0.05`) to lift them slightly from the `#F7F8FA` background. In Dark Mode, shadows are replaced by a 1px border of `#2D372E` to define edges.
- **Floating Action Buttons (FAB):** Higher elevation is reserved for the primary action (e.g., "Get Advice" or "Check Price") with a more pronounced shadow to signify interactivity.
- **Z-Index:**
  - Level 0: Background
  - Level 1: Cards & Search Bars
  - Level 2: Navigation Bars & App Bars
  - Level 3: Modals & Dialogs

## Shapes

The design system utilizes generous rounding to feel friendly and modern, moving away from "stiff" institutional looks.

- **Large Cards:** Always use a **24px** corner radius to create the "premium fintech" look.
- **Buttons & Inputs:** Use a **12px** radius. This distinguishes them from the structural cards while maintaining a soft aesthetic.
- **Chips & Badges:** Fully rounded (pill-shaped) to represent status indicators clearly.

## Components

### Buttons
- **Primary:** Solid `#1B5E20` with white text. High-contrast and clear.
- **Secondary:** Outlined with Primary Green or Solid `#4CAF50` for "Success/Positive" actions.
- **Tertiary:** Ghost buttons for less important actions like "View More".

### Cards
- The central element of the UI. Cards should have a `24px` radius, white background (in light mode), and internal padding of `16px`. Use them to group related data points like "Current Rice Price" or "Weather Forecast".

### Input Fields
- Filled style with a light gray background and a bottom-border that turns Green on focus. Ensure labels are always visible (not floating out of view) to help users with cognitive clarity.

### Chips & Badges
- Used for status (e.g., "Stable", "Rising", "Risk"). Use the Status Colors with a 10% opacity background of the same hue to keep text legible and the UI clean.

### Advisory Insight Box
- A special component featuring a `Soft Yellow` background, a `Rice Gold` left-accent border, and an AI icon. This denotes premium advice generated by the system.

### Progress Bars
- Used for "Harvest Readiness" or "Market Stability". Use the Fresh Green for positive progress and Red for critical depletion.