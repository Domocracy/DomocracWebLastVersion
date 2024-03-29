CHANGELOG
=========

1.0.0 (2014-09-22)
------------------

* First production release.
* In the pure PHP reader, a string length test after `fread()` was replaced
  with the difference between the start pointer and the end pointer. This
  provided a 15% speed increase.

0.3.3 (2014-09-15)
------------------

* Clarified behavior of 128-bit type in documentation.
* Updated phpunit and fixed some test breakage from the newer version.

0.3.2 (2014-09-10)
------------------

* Fixed invalid reference to global class RuntimeException from namespaced
  code. Fixed by Steven Don. GitHub issue #15.
* Additional documentation of `Metadata` class as well as misc. documentation
  cleanup.

0.3.1 (2014-05-01)
------------------

* The API now works when `mbstring.func_overload` is set.
* BCMath is no longer required. If the decoder encounters a big integer,
  it will try to use GMP and then BCMath. If both of those fail, it will
  throw an exception. No databases released by MaxMind currently use big
  integers.
* The API now officially supports HHVM when using the pure PHP reader.

0.3.0 (2014-02-19)
------------------

* This API is now licensed under the Apache License, Version 2.0.
* The code for the C extension was cleaned up, fixing several potential
  issues.

0.2.0 (2013-10-21)
------------------

* Added optional C extension for using libmaxminddb in place of the pure PHP
  reader.
* Significantly improved error handling in pure PHP reader.
* Improved performance for IPv4 lookups in an IPv6 database.

0.1.0 (2013-07-16)
------------------

* Initial release
