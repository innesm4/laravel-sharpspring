Laravel Sharpspring
===================

## Installation

This package can be installed through Composer.

```
{
    "require": {
		"innesm4/laravel-sharpspring": "dev-master"
	}
}
```

You must install this service provider app/config/app.php.

```
'providers' => [
    '...',
    'Innesm4\LaravelSharpspring\LaravelSharpspringServiceProvider'
];
```

This package also comes with a facade, which provides an easy way to call the the class app/config/app.php.


```

'aliases' => array(
	'...',
	'LaravelSharpspring' => 'Innesm4\LaravelSharpspring\LaravelSharpspringFacade',
)
```

You can publish the config file of the package using artisan

```
php artisan config:publish innesm4/laravel-sharpspring
```

After the config file has been created locate at:

```
/app/config/packages/innesm4/laravel-sharpspring/
```

And enter API details:

```
[

    'accountID' => '#',

    'secretKey' => '#'

];
```    

## Usage

When the installation is done you can easily retrieve Sharpspring API data. The package only handled read for now as I currently have no requirement to create, update or delete requests.

### Leads

```
LaravelSharpspring::getLeads($limit, $offset);
LaravelSharpspring::getLeadsDateRange('2015-01-01', '2015-01-19');
```   

### Opportunities

```
LaravelSharpspring::getOpportunities($limit, $offset);
LaravelSharpspring::getOpportunitiesDateRange('2015-01-01', '2015-01-19');
```   

### OpportunityLeads

```
LaravelSharpspring::getOpportunityLeads($limit, $offset);
LaravelSharpspring::getOpportunityLeadsDateRange('2015-01-01', '2015-01-19');
```   

### getAccounts

```
LaravelSharpspring::getAccounts($limit, $offset); 
LaravelSharpspring::getAccountsDateRange('2015-01-01', '2015-01-19');
```   

### getCampaigns

```
LaravelSharpspring::getCampaigns($limit, $offset);
LaravelSharpspring::getCampaignsDateRange('2015-01-01', '2015-01-19')
```   