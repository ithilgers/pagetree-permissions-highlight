# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.2.0] - 2026-03-13

### Added
- **Page tree filter toggle**: New dropdown menu item "Show editable pages only" in the page tree to filter down to pages the user can edit
- **Bridge nodes**: Parent pages without edit permissions are displayed greyed out to preserve the tree structure
- **ES6 JavaScript module**: Filter toggle as native TYPO3 backend module (`permissions-filter-toggle.js`)
- **Session-based filter state**: Filter is automatically disabled when the browser is closed
- **Info banner on active filter**: Banner styled like the mount point notice above the page tree, with an X button to deactivate
- **Info notification**: Brief notification shown when activating the filter
- **MutationObserver timeout**: Observer automatically disconnects after 10 seconds if the toolbar does not appear

### Changed
- Moved filter button from standalone toolbar button into the dropdown menu (consistent UI alongside "Refresh" and "Collapse All")
- Active state is now controlled via CSS class instead of inline styles

## [1.1.0] - 2026-01-06

### Security
- **Fixed CSS injection vulnerability**: Added comprehensive input validation for the `highlightColor` configuration to prevent potential XSS attacks through malicious CSS injection
- Color values are now strictly validated against safe CSS formats (hex, rgb, rgba, hsl, hsla, named colors)
- Invalid color values automatically fall back to a secure default color

### Added
- New `validateColor()` method with regex-based validation supporting multiple CSS color formats:
  - Hex colors: `#fff`, `#ffffff`, `#ffffffff`
  - RGB/RGBA: `rgb(255, 255, 255)`, `rgba(255, 255, 255, 0.5)`
  - HSL/HSLA: `hsl(120, 100%, 50%)`, `hsla(120, 100%, 50%, 0.5)`
  - Named CSS colors: `red`, `blue`, `green`, `transparent`, etc.
- Default highlight color constant for better maintainability

### Improved
- **Code Quality**: Added comprehensive PHPDoc documentation for all classes and methods
- Better code organization with extracted validation logic
- Improved maintainability with constant for default color value
- Enhanced security posture through input sanitization

### Changed
- Extension configuration color values are now validated on instantiation
- Invalid configuration values no longer cause security issues

## [1.0.0] - 2025-01-06

### Added
- Initial release
- Highlights pages in the backend page tree where the user has content editing permissions
- Configurable highlight color via extension configuration
- Automatic exclusion of admin users (who have access to all pages)
- Compatible with TYPO3 12.4 LTS

[1.2.0]: https://github.com/ithilgers/pagetree-permissions-highlight/compare/v1.1.0...v1.2.0
[1.1.0]: https://github.com/ithilgers/pagetree-permissions-highlight/compare/v1.0.0...v1.1.0
[1.0.0]: https://github.com/ithilgers/pagetree-permissions-highlight/releases/tag/v1.0.0
