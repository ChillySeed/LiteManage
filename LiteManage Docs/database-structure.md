# Database Structure

This document explains the database tables and relationships in LiteManage.

## Tables
1. **products**
   - Stores product details like name, brand, category, price, cost_price, quantity, and unit.

2. **customers**
   - Stores customer information.

3. **sales**
   - Records each sale with customer, date, total_amount, and payment_method.

4. **sale_items**
   - Stores each product sold in a sale with quantity, price, and subtotal.
   - Keeps historical price for reporting accuracy.

5. **suppliers (optional)**
   - Stores supplier info if you want to manage procurement.

## Relationships
- One **customer** can have many **sales**.
- One **sale** can have many **sale_items**.
- Each **sale_item** is linked to one **product**.
