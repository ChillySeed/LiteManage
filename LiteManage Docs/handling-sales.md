# Handling Sales

LiteManage allows recording sales efficiently.

## Steps to Record a Sale
1. Go to **Sales → Create Sale**.
2. Select the customer (or create a new one).
3. Add one or more products with the quantity being sold.
4. The price is auto-filled from the product’s current price.
5. Submit the sale:
   - `sale_items` stores each product in the sale.
   - Inventory (`products.quantity`) is updated automatically.
   - Sale totals are calculated.

## Notes
- Historical pricing is preserved in `sale_items.price`.
- Total sale amount and subtotals are stored for accurate reporting.
- Low stock products are flagged automatically.
