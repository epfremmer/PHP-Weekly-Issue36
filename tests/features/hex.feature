Feature: Hex to string conversion

  Hexadecimal values can be converted into phonetic string
  representation for easier pronunciation purposes

  Scenario: I can run the application
    Given I have arguments:
      | key | value |
      | hex | 0xFFF |
    When I run the "hex:phonetic" command
    Then I should not get any errors

  Scenario Outline: Invalid hex arguments throw an exception
    Given I have the hex value "<hex>"
    When I run the "hex:phonetic" command
    Then I should get an error

    Examples:
      | hex   |
      | fff   |
      | 1xfff |
      | 0x2gf |

  Scenario Outline: Basic Hex values are converted to phonetic strings
    Given I have the hex value "<hex>"
    When I run the "hex:phonetic" command
    Then I should get "<string>" response

    Examples:
      | hex    | string         |
      | 0xA0   | atta           |
      | 0xB0   | bibbity        |
      | 0xC0   | city           |
      | 0xD0   | dickety        |
      | 0xE0   | ebbity         |
      | 0xF0   | fleventy       |
      | 0xA000 | atta-bitey     |
      | 0xB000 | bibbity-bitey  |
      | 0xC000 | city-bitey     |
      | 0xD000 | dickety-bitey  |
      | 0xE000 | ebbity-bitey   |
      | 0xF000 | fleventy-bitey |

  Scenario Outline: Complex Hex values are converted to phonetic strings
    Given I have the hex value "<hex>"
    When I run the "hex:phonetic" command
    Then I should get "<string>" response

    Examples:
      | hex    | string                        |
      | 0x1f   | fleventeen                    |
      | 0xF5   | fleventy-five                 |
      | 0xB3   | bibbity-three                 |
      | 0xE4   | ebbity-four                   |
      | 0xABCD | atta-bee bitey city-dee       |
      | 0x1f05 | fleventeen bitey five         |
      | 0xBBBB | bibbity-bee bitey bibbity-bee |
      | 0xA0C9 | atta-bitey city-nine          |

  Scenario Outline: Multi-ordinal Complex Hex values are converted to phonetic strings
    Given I have the hex value "<hex>"
    When I run the "hex:phonetic" command
    Then I should get "<string>" response

    Examples:
      | hex            | string                                                                         |
      | 0x1f051ab56    | one-worddion fleventy-bitey fifty-one halfy atta-bee bitey fifty-six           |
      | 0xff051ab      | eff-bitey fleventy-halfy fifty-one bitey atta-bee                              |
      | 0xaf051ab5600  | a-bitey fleventy-worddion fifty-one bitey atta-bee halfy fifty-six bitey       |
      | 0x1f051ab56001 | fleventeen bitey five worddion abteen bitey bibbity-five halfy sixty-bitey one |

  Scenario Outline: Leading zeros do not affect phonetic conversion
    Given I have the hex value "<hex>"
    When I run the "hex:phonetic" command
    Then I should get "<string>" response

    Examples:
      | hex    | string         |
      | 0x00A0 | atta           |
      | 0x00B0 | bibbity        |
      | 0x00C0 | city           |
      | 0x00D0 | dickety        |
      | 0x00E0 | ebbity         |
      | 0x00F0 | fleventy       |

