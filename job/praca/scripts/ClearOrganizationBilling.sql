SET @organizationId = 386;
DELETE FROM billing_invoice_services WHERE invoice_id IN (SELECT id FROM billing_invoices WHERE organization_id = @organizationId);
DELETE FROM billing_invoices WHERE organization_id = @organizationId;
DELETE FROM billing_organization_services WHERE organization_id = @organizationId;
DELETE FROM billing_organization_service_counters WHERE organization_id = @organizationId;
UPDATE organizations SET standard_limit = 0, premium_limit = 0 WHERE id = @organizationId;
UPDATE vacancies SET is_publicated = 0 WHERE organization_id = @organizationId;