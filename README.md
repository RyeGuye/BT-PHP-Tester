Concept
==========
The idea behind this Braintree Integration is to provide a series of froms which allow you to till out parameters of each API call, with v.zero front-end tokenization interpolated as the flow is described. In version one, there is a single flow with a Hosted Fields integration that is stored in the vault, and finally used with a transaction. The idea is to allow you to input parameters intentionally correct, or otherwise to see what the results will be. 

This integration is built and tested on [MAMP][1] version 3.5 with PHP 5.6.


### Where To Find What

- Codebase/Configuration.php
	This is where you'll want to input your API keys from a sandbox account

- Codebase/CallCruncher.php
	This is where the API calls to Braintree are formed and ran.

- Codebase/BTarrays.php
	Used by the API call crunchers, the BT arrays make up the allowed parameters which an API call is formed with. In the v1 release, not all parameters are allowed.  

 [1]: https://www.mamp.info/
