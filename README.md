# Less CSS module for Silverstripe

This module creates a simple interface for developing [LESS](http://lesscss.org/) powered websites using Silverstripe.

LESS is a powerful API that allows you to develop CSS styles with real programming logic. This lets developers
generate styles expressively, as opposed to repetitively, supporting maintainable and responsive designs.

LESS injects functionality such as variables, mixins, operations and functions.

This module is built on the [LessPhp](http://leafo.net/lessphp/) implementation of LESS.

## Credits and Authors

 * Olivier Penhoat - Author - <https://github.com/openhoat/silverstripe-lessphp>
 * Damian Mooyman - <https://github.com/tractorcow/silverstripe-lessphp>

## License

 * TODO

## Requirements

 * SilverStripe 2.4.5, may work on lower versions
 * PHP 5.2

## Installation Instructions

 * Extract all files into the 'lessphp' folder under your Silverstripe root.
 * Create a 'lesscss' directory within your themes folder (eg /themes/tractorcow/lesscss).
   This is where you should place all less scripts. Subthemes may have their own lesscss folders.
 * Make sure that your css folder has write access on your development environment (or on your staging
   environment if you intend to build scripts there).
 * To compile CSS files either run in development mode, or perform a manual flush with ?flush=all

## Documentation

 * LESS API reference can be found at <http://lesscss.org/#docs>

## Examples

For more examples please see <http://lesscss.org/#synopsis>

### Variables and Nested Rules

/themes/tractorcow/lesscss/typography.less.css

    @color: #4D926F;

    .typography
    { 
        p {
            color: @color;
        }
        h1 {
            color: @color;
        }
    }

Will generate:

/themes/tractorcow/css/typgraphy.css

    .typography p {
        color: #4D926F;
    }
    .typography h1 {
        color: #4D926F;
    }

### Mixins (or macros)

/themes/tractorcow/lesscss/layout.less.css

    .rounded-corners(@radius: 5px)
    {
        border-radius: @radius;
        -webkit-border-radius: @radius;
        -moz-border-radius: @radius;
    }

    #header {
        .rounded-corners;
    }
    #footer {
        .rounded-corners(10px);
    }

Will generate:

/themes/tractorcow/css/layout.css

    #header {
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
    }
    #footer {
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
    }