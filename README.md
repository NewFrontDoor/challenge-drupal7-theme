# Drupal 7 Challenge Conference Theme (Vision 100 IT)

Below are instructions on how to develop the theme.

- [Prerequisites](#prerequisites)
- [Additional Setup](#setup)
- [Override Styles](#styles)
- [Override Settings](#settings)
- [Override Templates and Theme Functions](#registry)

## Prerequisites
- Node js must be installed on your machine.

## Additional Setup {#setup}
- Setup up gulp using npm install -g gulp
- Run npm install in the repository directory
- To recompile the style.css file run gulp with no parameters
- To watch the files and recompile when less has changed run 'gulp watch'

## Override Styles {#styles}
The less file `theme-settings.less` is where you would normally go to add a new theme
for a new year of challenge.  Sub-directories contain particular styles for different pages and
content types in the site.
