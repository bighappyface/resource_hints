# Resource Hints

Configure resource hints for better user agent performance

https://www.w3.org/TR/resource-hints/

## Instructions

Unpack in the *modules* folder (currently in the root of your Drupal installation) and enable in `/admin/modules`.

Then, visit `/admin/config/development/resource-hints` and enter your own set of configurations for the various resource hint types.

## Contributing

Please follow the standards as explained in the Examples for Developers module:

http://cgit.drupalcode.org/examples/tree/STANDARDS.md

### PHPCS using Drupal standard

```shell
# From drupal root - please adjust to your environment
$ vendor/bin/phpcs -p -s --standard=Drupal sites/all/modules/resource_hints/*.{install,module,inc}
..

Time: 97ms; Memory: 8Mb
```

### Tests

```shell
# From drupal root - please adjust to your environment
$ php ./scripts/run-tests.sh --color --verbose --url http://127.0.0.1:8081/ --class ResourceHintsWebTestCase

Drupal test run
---------------

Tests to be run:
 - Resources Hints Web Test Case (ResourceHintsWebTestCase)

Test run started:
 Sunday, January 15, 2017 - 21:10

Test summary
------------

Resources Hints Web Test Case 48 passes, 1 fail, 0 exceptions, and 18 debug messages

Test run duration: 3 sec

Detailed test results
---------------------


---- ResourceHintsWebTestCase ----


Status    Group      Filename          Line Function
--------------------------------------------------------------------------------
Pass      Other      resource_hints.te   29 ResourceHintsWebTestCase->setUp()
    Enabled modules: resource_hints
Pass      Role       resource_hints.te   36 ResourceHintsWebTestCase->setUp()
    Created role of name: tYCFctQh, id: 3
Pass      Role       resource_hints.te   36 ResourceHintsWebTestCase->setUp()
    Created permissions: access administration pages, administer nodes,
    administer site configuration, administer resource hints
Pass      User login resource_hints.te   36 ResourceHintsWebTestCase->setUp()
    User created with name zq8zLLzP and pass mRde6J6oES
Pass      Browser    resource_hints.te   38 ResourceHintsWebTestCase->setUp()
    GET http://127.0.0.1:8081/user returned 200 (5.89 KB).
Pass      Browser    resource_hints.te   38 ResourceHintsWebTestCase->setUp()
    Valid HTML found on "http://127.0.0.1:8081/user"
Pass      Browser    resource_hints.te   38 ResourceHintsWebTestCase->setUp()
    GET http://127.0.0.1:8081/user/2 returned 200 (5.14 KB).
Pass      Browser    resource_hints.te   38 ResourceHintsWebTestCase->setUp()
    Valid HTML found on "http://127.0.0.1:8081/user/2"
Pass      User login resource_hints.te   38 ResourceHintsWebTestCase->setUp()
    User zq8zLLzP successfully logged in.
Pass      Browser    resource_hints.te   49 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.48 KB).
Pass      Browser    resource_hints.te   49 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Browser    resource_hints.te   49 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.77 KB).
Pass      Browser    resource_hints.te   49 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Browser    resource_hints.te   53 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.54 KB).
Pass      Browser    resource_hints.te   53 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Browser    resource_hints.te   53 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.72 KB).
Pass      Browser    resource_hints.te   53 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Other      resource_hints.te   54 ResourceHintsWebTestCase->testResou
    Value &#039;&lt;//drupal.org&gt;; rel=dns-prefetch&#039; is TRUE.
Pass      Browser    resource_hints.te   58 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.49 KB).
Pass      Browser    resource_hints.te   58 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Browser    resource_hints.te   58 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.78 KB).
Pass      Browser    resource_hints.te   58 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Other      resource_hints.te   59 ResourceHintsWebTestCase->testResou
    Raw "&lt;link rel=&quot;preconnect&quot; href=&quot;//drupal.org&quot;
    /&gt;" found
Pass      Browser    resource_hints.te   62 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.55 KB).
Pass      Browser    resource_hints.te   62 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Browser    resource_hints.te   62 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.74 KB).
Pass      Browser    resource_hints.te   62 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Other      resource_hints.te   63 ResourceHintsWebTestCase->testResou
    Value &#039;&lt;//drupal.org&gt;; rel=preconnect&#039; is TRUE.
Pass      Browser    resource_hints.te   67 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.5 KB).
Pass      Browser    resource_hints.te   67 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Browser    resource_hints.te   67 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.79 KB).
Pass      Browser    resource_hints.te   67 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Other      resource_hints.te   68 ResourceHintsWebTestCase->testResou
    Raw "&lt;link rel=&quot;prefetch&quot; href=&quot;//drupal.org&quot; /&gt;"
    found
Pass      Browser    resource_hints.te   71 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.56 KB).
Pass      Browser    resource_hints.te   71 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Browser    resource_hints.te   71 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.75 KB).
Pass      Browser    resource_hints.te   71 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Other      resource_hints.te   72 ResourceHintsWebTestCase->testResou
    Value &#039;&lt;//drupal.org&gt;; rel=prefetch&#039; is TRUE.
Pass      Browser    resource_hints.te   76 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.51 KB).
Pass      Browser    resource_hints.te   76 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Browser    resource_hints.te   76 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.8 KB).
Pass      Browser    resource_hints.te   76 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Other      resource_hints.te   77 ResourceHintsWebTestCase->testResou
    Raw "&lt;link rel=&quot;prerender&quot; href=&quot;//drupal.org&quot; /&gt;"
    found
Pass      Browser    resource_hints.te   80 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.57 KB).
Pass      Browser    resource_hints.te   80 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Browser    resource_hints.te   80 ResourceHintsWebTestCase->testResou
    GET http://127.0.0.1:8081/admin/config/development/resources-hints returned
    200 (11.76 KB).
Pass      Browser    resource_hints.te   80 ResourceHintsWebTestCase->testResou
    Valid HTML found on
    "http://127.0.0.1:8081/admin/config/development/resources-hints"
Pass      Other      resource_hints.te   81 ResourceHintsWebTestCase->testResou
    Value &#039;&lt;//drupal.org&gt;; rel=prerender&#039; is TRUE.
Fail      Other      run-tests.sh       386 simpletest_script_run_one_test()
    Failed to find test tables to drop.
```

## Helpful resources

https://www.w3.org/TR/resource-hints/
https://www.igvita.com/2015/08/17/eliminating-roundtrips-with-preconnect/
https://css-tricks.com/prefetching-preloading-prebrowsing/
https://medium.com/@luisvieira_gmr/html5-prefetch-1e54f6dda15d#.liri85j7v
https://developer.mozilla.org/en-US/docs/Web/HTTP/Link_prefetching_FAQ
https://developer.mozilla.org/en-US/docs/Web/HTML/Link_types
https://www.w3.org/TR/html4/types.html#type-links
