### TODOs :
1. ~Dashboard display total owners, properties, tenants, agents, vendors~
2. Dashboard display outstanding payments, overdue rent
3. Dashboard display recent payments and transactions (latest rental, upcoming overdue rent)
4. ~Use sweetalert2 for notifications~
5. ~Edit property -> image upload will ADD image instead of REPLACING existing images~
6. ~Image deleted from public storage~
7. ~Newly created rent will have 'pending' and 'Invoice' will be created. Once payment done then change rent status to 'ongoing'~
8. ~All automatic status changes will be handled by events and listeners.~
9. Auto generate PDF Invoice using https://github.com/LaravelDaily/laravel-invoices
10. ~Display validation errors on create forms - currently with SweetAlert2~
11. Using \Carbon\CarbonImmutable for date
12. Log transactions and actions
13. Notifications (database and email)
14. Tenants show will display tenant's previous rent information

### HEADS UP!
1. check for $request->all() and change to $request->validated() using FormRequest
