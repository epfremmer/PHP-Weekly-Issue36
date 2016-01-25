# Challenge 036: Pronouncing Hex

## Install

* `composer install`

## Usage

    Usage:
      hex:phonetic <hex>
    
    Arguments:
      hex                   Hex value to convert
    
    Options:
      -h, --help            Display this help message
      -q, --quiet           Do not output any message
      -V, --version         Display this application version
          --ansi            Force ANSI output
          --no-ansi         Disable ANSI output
      -n, --no-interaction  Do not ask any interactive question
      -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
    
    Help:
     Convert hexadecimal values to phonetic pronunciation
     
## Tests

* `bin/behat`

## Coverage

Code coverage gets generated in the build directory automatically by the behat test suites. The coverage report can be
viewed by opening `/build/coverage/html/index.html` in your browser.
