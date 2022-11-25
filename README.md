After upgrade Magento to version 2.4.5 you can see this error:
TypeError: Magento\Elasticsearch\Model\ResourceModel\Fulltext\Collection\SearchResultApplier::categoryProductByCustomSortOrder(): Argument #1 ($categoryId) must be of type int, array given


This bug is related to the latest Magento changes and custom extensions like Amasty Improved Layered Navigation.

To see more information

https://github.com/magento/magento2/issues/35918


If you are Amasty customer, you can fix this error by installing additional package from our private repository:

composer require amasty/module-mage-2.4.5-fix


But this case can be reproduced without our extension. This is why we made this package public.
