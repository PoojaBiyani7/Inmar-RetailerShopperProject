●	Write SQL to get the number of retailers available in the system.
->  SELECT count(*) FROM `retailer`;

●	Write SQL to get the shoppers counts for each retailer (who purchased).
->  SELECT count(*),sRetailerId FROM `retailershopper` group by sRetailerId

●	Write SQL to get all the shoppers count.
->  SELECT count(*) FROM `shopper`;

●	Write SQL to get purchase amount per day wrt to a retailer.
->  SELECT transactionDate,sRetailerId,sum(retailerWallet) as purchaseAmountPerDay FROM `retailershopper` group by sRetailerId,transactionDate;

●	Write SQL to find top retailer based on the number of purchases - Bonus points
->	select sRetailerId as TopRetailer, max(number) as maxPurchase from (SELECT sRetailerId,count(*) as number FROM `retailershopper` group by sRetailerId) as CountTable;

●	Write SQL to find a loyal shopper of any retailer based on the number of purchased more than threshold 5 - Bonus points
->  SELECT sRetailerId as Retailer,shopperId as LoyalShopper,count(*) as number FROM `retailershopper` group by sRetailerId,shopperId having count(*)>=5;

