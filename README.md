## Menu
- **Dashboard**
- **Property**

   - List of all houses/parking which can contain:

      - Owner

      - Address

      - House/Parking number

      - Feature

      - Rent

      - Status (Vacant/Occupied)

      - Picture of house (can upload picture and save to cloud if possible)

      - Agent Name

   - Option to Add/Edit/Delete

   - Clicking the house could provide view of all the tenant (current/Previous) (sub window
using bootstrap is possible)

- **Tenant**
   - List of all the Tenant (current/previous)

      - Full Name

      - Identity/Passport Number

      - Phone Number

      - Email

      - Registration Date

      - House/Parking

      - Agreement Document

      - ~~Agent Name/Owner Direct~~

      - Status

      - ~~Exit Date~~

   - Clicking on the tenant would open up tenant details

   - Option to Add/Edit/Delete(Only Admin)

- **Rent**
   
   - Tenant ID

   - Property ID

   - IN DATE

   - OUT DATE

   - Deposit
- **Owner**
   - Same details as Tenant

- **Agent**
   
   - List of all agent

      - Full Name

      - Company Name

      - Phone Number

      - Email

      - House/Parking

- **Vendors**
   - List of all vendors
  
      - Company Name

      - Contact Person

      - Phone number

      - Email

- **Invoices**

   - List of all invoices issue, including bill

      - Issue To (Tenant/Owner)

      - Date issued

      - Details of invoice

      - Date Due

      - Ability to Upload Invoices

      - Amount

      - Status (Open/Ovedue/Paid)

   - Option to Add/Edit/Delete

   - Cron job for schedule invoices - rent

- **Transaction**

   - List of all transaction

      - Date

      - Type of transaction (Rent/Utility/Maintainence)

      - Vendor

      - House/Parking related to transaction

      - Amount

## Add On

- Reminder send thru email for overdue invoices

- Upload documents to cloud based e.g. dropbox, gdrive, onedrive

- Ability to assigned Admin

- Each owner can only view their unit but there manager that can view all unit. So Role would be

   - Admin (system admin)

   - Manager (Manage the company-can view all)

   - Owner

   - Tenant

- Can put company profile i.e. for the main page

- Ability to put system on maintenance.

## DB Relationships

- Property belongsTo Tenant

- Property belongsTo Owner

- Property belongsTo Agent (nullable)

- Tenant hasMany Properties

- Owner hasMany Properties

- Agent hasMany Properties (nullable)

## DB Seeders / Factories

- Super Admin seeder :

    Username : sadmin

    Email : admin@sadmin.com
    
    Password : qpAL1029#

- OwnerFactory

- PropertyFactory