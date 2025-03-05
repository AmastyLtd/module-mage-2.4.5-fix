After upgrade Magento to version 2.4.5 you can see this error:
TypeError: Magento\Elasticsearch\Model\ResourceModel\Fulltext\Collection\SearchResultApplier::categoryProductByCustomSortOrder(): Argument #1 ($categoryId) must be of type int, array given


This bug is related to the latest Magento changes and custom extensions like Amasty Improved Layered Navigation.

To see more information

https://github.com/magento/magento2/issues/35918


If you are Amasty customer, you can fix this error by installing additional package from our private repository:

composer require amasty/module-mage-2.4.5-fix


But this case can be reproduced without our extension. This is why we made this package public.

<h2>Other Amasty extensions</h2>
-> <a href="https://amasty.com/cron-scheduler-for-magento-2.html" target="_blank">Cron Scheduler for Magento 2</a><br>
-> <a href="https://amasty.com/countdown-timer-for-magento-2.html" target="_blank">Countdown Timer for Magento 2</a><br>
-> <a href="https://amasty.com/cookie-consent-for-magento-2.html" target="_blank">Cookie Consent (GDPR) for Magento 2</a><br>
-> <a href="https://amasty.com/color-swatches-pro-for-magento-2.html" target="_blank">Color Swatches Pro for Magento 2</a><br>
-> <a href="https://amasty.com/chatgpt-ai-content-for-magento-2.html" target="_blank">ChatGPT AI Content Generator</a><br>
-> <a href="https://amasty.com/chat-for-magento-2.html" target="_blank">Chat for Magento 2</a><br>
-> <a href="https://amasty.com/cash-on-delivery-for-magento-2.html" target="_blank">Cash on Delivery for Magento 2</a><br>
-> <a href="https://amasty.com/cancel-orders-for-magento-2.html" target="_blank">Cancel Orders for Magento 2</a><br>
-> <a href="https://amasty.com/call-for-price-for-magento-2.html" target="_blank">Call for Price for Magento 2</a><br>
-> <a href="https://amasty.com/california-consumer-privacy-act-for-magento-2.html" target="_blank">California Consumer Privacy Act for Magento 2</a><br>
-> <a href="https://amasty.com/blog-pro-for-magento-2.html" target="_blank">Blog Pro for Magento 2</a><br>
-> <a href="https://amasty.com/base-price-for-magento-2.html" target="_blank">Price per Unit for Magento 2</a><br>
-> <a href="https://amasty.com/banner-slider-for-magento-2.html" target="_blank">Banner Slider for Magento 2</a><br>
-> <a href="https://amasty.com/b2b-ecommerce-suite-for-magento-2.html" target="_blank">B2B Ecommerce Suite for Magento 2</a><br>
-> <a href="https://amasty.com/magento-advanced-permissions.html" target="_blank">Advanced Permissions</a><br>
-> <a href="https://amasty.com/magento-abandoned-cart-email.html" target="_blank">Abandoned Cart Email</a><br>
-> <a href="https://amasty.com/improved-layered-navigation.html" target="_blank">Improved Layered Navigation</a><br>
-> <a href="https://amasty.com/extended-product-grid-with-editor.html" target="_blank">Extended Product Grid with Editor</a><br>
