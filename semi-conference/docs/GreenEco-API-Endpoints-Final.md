---
pdf_options:
  format: A4
  margin:
    top: 15mm
    bottom: 20mm
    left: 15mm
    right: 15mm
  printBackground: true
  displayHeaderFooter: true
  headerTemplate: "<span></span>"
  footerTemplate: "<div style='font-size:9px;width:100%;text-align:center;color:#999;padding:4px 20px;font-family:Helvetica,Arial,sans-serif;'>GreenEco API Reference &mdash; Confidential &mdash; Backend Team &mdash; Page <span class='pageNumber'></span></div>"
---

<style>
  @page :first { margin-bottom: 0; }
  body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #333; line-height: 1.5; margin: 0; padding: 0;}
  .page-break { page-break-after: always; }
  table { width: 100%; border-collapse: collapse; margin-top: 0; margin-bottom: 20px; font-size: 13px; border: 1px solid #e0e0e0; page-break-inside: avoid; page-break-before: auto; }
  th { background-color: #e9ecef; color: #1B4332; padding: 8px 8px; text-align: left; border: 1px solid #e0e0e0; font-size: 12px; }
  td { padding: 8px 8px; border: 1px solid #e0e0e0; vertical-align: top; font-size: 12px; }
  tr:nth-child(even) { background-color: #fcfcfc; }
  code { background-color: #f1f3f5; color: #d63384; padding: 2px 5px; border-radius: 3px; font-size: 12.5px; border: 1px solid #e9ecef; }
  .module-section { margin-bottom: 20px; page-break-inside: avoid; }
  th:nth-child(1), th:nth-child(3) { text-align: center; }
</style>

<!-- PAGE 1: COVER -->
<div style="background-color: #1B4332; color: white; height: 90vh; display: flex; flex-direction: column; align-items: center; justify-content: center; border-radius: 12px; margin-top: 10px; text-align: center; padding: 40px; -webkit-print-color-adjust: exact;">
  <div style="background-color: #52B788; color: white; font-size: 65px; font-weight: bold; width: 130px; height: 130px; display: inline-flex; align-items: center; justify-content: center; border-radius: 16px; margin-bottom: 40px;">G</div>
  <h1 style="font-size:65px;margin:0;color:white;border:none;letter-spacing:1px;font-family:sans-serif;">GreenEco</h1>
  <h2 style="color:#52B788;border:none;font-weight:normal;margin-top:10px;font-size:26px;font-family:sans-serif;">API Endpoints</h2>
  <hr style="width:300px;border:0;border-top:1px solid #52B788;margin:40px auto;">
  <p style="font-size:16px;margin:5px 0;color:#e9ecef;">Backend Team &middot; Laravel 12 &middot; JWT Auth &middot; RESTful API</p>
  <p style="font-size:16px;margin:5px 0;color:#e9ecef;">Version: 7.0 &middot; Generated: July 24, 2026</p>
  <p style="font-size:16px;margin:5px 0;color:#e9ecef;">17 Sections &middot; 69 Endpoints</p>
</div>



<!-- PAGE 2: HTTP METHODS + TABLE OF CONTENTS -->
<div style="text-align:center;margin-bottom:15px;">
  <h2 style="color:#1B4332;font-family:sans-serif;font-size:22px;margin-bottom:6px;">HTTP Methods &amp; Resource Actions</h2>
  <p style="color:#666;font-size:13px;margin:0;">Standard RESTful routing definitions used throughout the GreenEco system.</p>
</div>

<table style="width:100%;border-collapse:collapse;font-size:12px;text-align:center;border:1px solid #e0e0e0;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;margin-bottom:8px;">
  <tr style="background-color:#f8f9fa;">
    <td style="border:1px solid #e0e0e0;padding:10px;"><span style="color:#0d6efd;font-weight:bold;font-size:14px;">GET</span><br><span style="color:#555;font-size:11px;margin-top:4px;display:block;">Read data</span></td>
    <td style="border:1px solid #e0e0e0;padding:10px;"><span style="color:#198754;font-weight:bold;font-size:14px;">POST</span><br><span style="color:#555;font-size:11px;margin-top:4px;display:block;">Create resource</span></td>
    <td style="border:1px solid #e0e0e0;padding:10px;"><span style="color:#fd7e14;font-weight:bold;font-size:14px;">PUT</span><br><span style="color:#555;font-size:11px;margin-top:4px;display:block;">Replace resource</span></td>
    <td style="border:1px solid #e0e0e0;padding:10px;"><span style="color:#6f42c1;font-weight:bold;font-size:14px;">PATCH</span><br><span style="color:#555;font-size:11px;margin-top:4px;display:block;">Partial update</span></td>
    <td style="border:1px solid #e0e0e0;padding:10px;"><span style="color:#dc3545;font-weight:bold;font-size:14px;">DELETE</span><br><span style="color:#555;font-size:11px;margin-top:4px;display:block;">Remove resource</span></td>
  </tr>
</table>

<div style="text-align:center;margin-top:0;margin-bottom:25px;font-size:12px;color:#888;">GreenEco HTTP Methods Reference</div>

<div style="background-color:#1B4332;color:white;padding:8px 16px;font-size:18px;font-weight:bold;border-radius:4px 4px 0 0;margin-bottom:0;margin-top:10px;">Table of Contents</div>
<table style="width:100%;border-collapse:collapse;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:12px;margin-bottom:10px;">
  <thead>
    <tr><th style="width:10%;background-color:#52B788;color:white;padding:8px 10px;text-align:center;border:1px solid #4cae80;">#</th><th style="width:75%;background-color:#52B788;color:white;padding:8px 10px;text-align:left;border:1px solid #4cae80;">Section</th><th style="width:15%;background-color:#52B788;color:white;padding:8px 10px;text-align:center;border:1px solid #4cae80;">Endpoints</th></tr>
  </thead>
  <tbody>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">1</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Authentication</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">9</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">2</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Addresses</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">4</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">3</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Pickup Requests</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">4</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">4</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Bin Requests</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">4</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">5</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Rewards &amp; Vouchers</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">3</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">6</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Notifications</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">3</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">7</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Admin &mdash; Dashboard</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">1</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">8</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Admin &mdash; Users</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">6</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">9</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Admin &mdash; Pickups</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">7</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">10</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Admin &mdash; Drivers</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">6</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">11</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Admin &mdash; Bin Requests</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">2</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">12</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Admin &mdash; Rewards</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">5</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">13</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Admin &mdash; Vouchers</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">2</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">14</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Admin &mdash; Factories</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">5</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">15</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Admin &mdash; Waste Categories</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">4</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">16</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Admin &mdash; Reports</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">3</td></tr>
    <tr><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">17</td><td style="padding:6px 8px;border:1px solid #e0e0e0;">Admin &mdash; Notifications</td><td style="text-align:center;padding:6px 8px;border:1px solid #e0e0e0;">1</td></tr>
    <tr><td colspan="2" style="font-weight:bold;text-align:right;padding:8px 10px;border:1px solid #e0e0e0;background-color:#eaf7f1;color:#1B4332;">Total</td><td style="font-weight:bold;text-align:center;padding:8px 10px;border:1px solid #e0e0e0;background-color:#eaf7f1;color:#1B4332;">69</td></tr>
  </tbody>
</table>

<!-- PAGES 2+: ENDPOINTS -->

<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">1</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Authentication</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">1</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>register</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">—</span></td><td>Register new user. Triggers email verification notification.</td></tr>
      <tr><td style="text-align:center;">2</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>login</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">—</span></td><td>Authenticate user. Returns JWT access token. Throttle: 5/60s.</td></tr>
      <tr><td style="text-align:center;">3</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>resend-verification-email</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">—</span></td><td>Resend email verification link.</td></tr>
      <tr><td style="text-align:center;">4</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>email/verify/{id}/{hash}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">—</span></td><td>Verify email address using signed URL parameters.</td></tr>
      <tr><td style="text-align:center;">5</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>forgot-password</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">—</span></td><td>Send password reset link to email. Throttle: 3/60s.</td></tr>
      <tr><td style="text-align:center;">6</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>reset-password</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">—</span></td><td>Reset password using token from email. Throttle: 5/30s.</td></tr>
      <tr><td style="text-align:center;">7</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>me</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Get authenticated user profile: id, name, email, phone, photo, points, role, is_active.</td></tr>
      <tr><td style="text-align:center;">8</td><td style="text-align:center;"><span style="color:#fd7e14;font-weight:bold;font-size:12px;">PUT</span></td><td><code>me</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Update profile: name, phone, photo (file upload).</td></tr>
      <tr><td style="text-align:center;">9</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>logout</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Invalidate current JWT token.</td></tr>
    </tbody>
  </table>
</div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">2</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Addresses</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">10</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>addresses</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>List saved addresses. Paginated.</td></tr>
      <tr><td style="text-align:center;">11</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>addresses</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Add address: label, governorate, city, district, street, building, floor, apartment, phone, type.</td></tr>
      <tr><td style="text-align:center;">12</td><td style="text-align:center;"><span style="color:#fd7e14;font-weight:bold;font-size:12px;">PUT</span></td><td><code>addresses/{address}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Update address. Ownership check (403 if not owner).</td></tr>
      <tr><td style="text-align:center;">13</td><td style="text-align:center;"><span style="color:#dc3545;font-weight:bold;font-size:12px;">DELETE</span></td><td><code>addresses/{address}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Delete address. Blocked if linked to pending pickup (409 Conflict).</td></tr>
    </tbody>
  </table>
</div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">3</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Pickup Requests</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">14</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>pickup-requests</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>List my pickups. Filter: ?status=. Paginated.</td></tr>
      <tr><td style="text-align:center;">15</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>pickup-requests</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Schedule: address_id, date, time_slot, notes, waste_category_id, estimated_kg. Status = Pending.</td></tr>
      <tr><td style="text-align:center;">16</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>pickup-requests/{id}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Single pickup with all relations.</td></tr>
      <tr><td style="text-align:center;">17</td><td style="text-align:center;"><span style="color:#6f42c1;font-weight:bold;font-size:12px;">PATCH</span></td><td><code>pickup-requests/{id}/cancel</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Cancel if Pending. Sets Canceled.</td></tr>
    </tbody>
  </table>
</div>

<div class="page-break"></div>

<div style="margin-top:-10px;margin-bottom:20px;padding:8px 12px;background-color:#eaf7f1;border-left:4px solid #52B788;font-size:12px;color:#1B4332;"><strong>Status flow:</strong> Pending(1) &rarr; Accepted(2) &rarr; Assigned(3) &rarr; OnTheWay(4) &rarr; PickedUp(5) &rarr; Delivered(6) &rarr; Completed(7) / Canceled(8)</div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">4</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Bin Requests</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">18</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>bin-requests</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>List my bin orders. Filter: ?status=. Paginated.</td></tr>
      <tr><td style="text-align:center;">19</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>bin-requests</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Order bins: quantity, address_id, payment_method. 60pts/bin or 100 EGP. Free if >=3 completed pickups.</td></tr>
      <tr><td style="text-align:center;">20</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>bin-requests/{binRequest}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Single bin request. Policy-gated (ownership check).</td></tr>
      <tr><td style="text-align:center;">21</td><td style="text-align:center;"><span style="color:#6f42c1;font-weight:bold;font-size:12px;">PATCH</span></td><td><code>bin-requests/{binRequest}/cancel</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Cancel if Pending. Refunds points if paid with points. No refund if GIFTED.</td></tr>
    </tbody>
  </table>
</div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">5</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Rewards &amp; Vouchers</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">22</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>rewards</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Browse active rewards. Ordered by points_cost ASC. Paginated.</td></tr>
      <tr><td style="text-align:center;">23</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>rewards/{id}/redeem</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Redeem: deducts points, generates unique code (BRAND-XXXXXX), creates voucher with 3mo expiry.</td></tr>
      <tr><td style="text-align:center;">24</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>vouchers</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>My valid vouchers (expiry >= now). Paginated.</td></tr>
    </tbody>
  </table>
</div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">6</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Notifications</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">25</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>notifications</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>My notifications. Filter: ?unread_only=. Response includes unread_count. Paginated.</td></tr>
      <tr><td style="text-align:center;">26</td><td style="text-align:center;"><span style="color:#6f42c1;font-weight:bold;font-size:12px;">PATCH</span></td><td><code>notifications/read-all</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Mark all unread as read.</td></tr>
      <tr><td style="text-align:center;">27</td><td style="text-align:center;"><span style="color:#6f42c1;font-weight:bold;font-size:12px;">PATCH</span></td><td><code>notifications/{notification}/read</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">USER</span></td><td>Mark one as read. Ownership check (403 if not owner).</td></tr>
    </tbody>
  </table>
</div>

<div class="page-break"></div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">7</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Admin &mdash; Dashboard</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">28</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/analytics</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>KPIs: total_users, pickups, completed/pending, waste kg by category, revenue, active_drivers, factories. Cached 10min.</td></tr>
    </tbody>
  </table>
</div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">8</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Admin &mdash; Users</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">29</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/users</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>List all users. Filters: ?search=&status=&page=. Cached 10min.</td></tr>
      <tr><td style="text-align:center;">30</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/users/{id}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>User details. Cached.</td></tr>
      <tr><td style="text-align:center;">31</td><td style="text-align:center;"><span style="color:#6f42c1;font-weight:bold;font-size:12px;">PATCH</span></td><td><code>admin/users/{id}/suspend</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Set isActive=false. Flushes user cache.</td></tr>
      <tr><td style="text-align:center;">32</td><td style="text-align:center;"><span style="color:#6f42c1;font-weight:bold;font-size:12px;">PATCH</span></td><td><code>admin/users/{id}/activate</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Set isActive=true. Flushes user cache.</td></tr>
      <tr><td style="text-align:center;">33</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/users/{id}/history</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Full recycling history: pickups, vouchers, bin requests, summary stats.</td></tr>
      <tr><td style="text-align:center;">34</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>admins/assign/{user}</code></td><td style="text-align:center;"><span style="color:#6f42c1;font-weight:bold;font-size:11px;">SUPER</span></td><td>Assign admin role. Permission: assign admins.</td></tr>
    </tbody>
  </table>
</div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">9</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Admin &mdash; Pickups</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">35</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/pickups</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>All pickups. Filters: ?status=&user_id=&driver_id=&from_date=&to_date=.</td></tr>
      <tr><td style="text-align:center;">36</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/pickups/{id}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Single pickup with all relations.</td></tr>
      <tr><td style="text-align:center;">37</td><td style="text-align:center;"><span style="color:#6f42c1;font-weight:bold;font-size:12px;">PATCH</span></td><td><code>admin/pickups/{id}/accept</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Accept a pending pickup (Pending &rarr; Accepted).</td></tr>
      <tr><td style="text-align:center;">38</td><td style="text-align:center;"><span style="color:#6f42c1;font-weight:bold;font-size:12px;">PATCH</span></td><td><code>admin/pickups/{id}/reject</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Reject a pickup (Pending &rarr; Canceled).</td></tr>
      <tr><td style="text-align:center;">39</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>admin/pickups/{id}/assign-driver</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Set driver_id + status &rarr; Assigned.</td></tr>
      <tr><td style="text-align:center;">40</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>admin/pickups/{id}/assign-factory</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Set factory_id. Checks daily capacity first.</td></tr>
      <tr><td style="text-align:center;">41</td><td style="text-align:center;"><span style="color:#6f42c1;font-weight:bold;font-size:12px;">PATCH</span></td><td><code>admin/pickups/{id}/status</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Manual status update. Observer handles points + notifications on Complete.</td></tr>
    </tbody>
  </table>
</div>

<div class="page-break"></div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">10</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Admin &mdash; Drivers</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">42</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/drivers/available</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>List available drivers (status=available). Paginated.</td></tr>
      <tr><td style="text-align:center;">43</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/drivers</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>List all drivers. Filter: ?status=. Paginated.</td></tr>
      <tr><td style="text-align:center;">44</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>admin/drivers</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Create driver: name, email, phone, password, license_number, vehicle_type.</td></tr>
      <tr><td style="text-align:center;">45</td><td style="text-align:center;"><span style="color:#fd7e14;font-weight:bold;font-size:12px;">PUT</span></td><td><code>admin/drivers/{driver}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Update driver info.</td></tr>
      <tr><td style="text-align:center;">46</td><td style="text-align:center;"><span style="color:#dc3545;font-weight:bold;font-size:12px;">DELETE</span></td><td><code>admin/drivers/{driver}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Soft-remove (status &rarr; Removed). Keeps referential integrity.</td></tr>
      <tr><td style="text-align:center;">47</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/drivers/{driver}/pickups</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Completed pickups for this driver.</td></tr>
    </tbody>
  </table>
</div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">11</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Admin &mdash; Bin Requests</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">48</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/bin-requests</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>All bin orders. Eager-loads user + address. Filter: ?status=. Paginated.</td></tr>
      <tr><td style="text-align:center;">49</td><td style="text-align:center;"><span style="color:#6f42c1;font-weight:bold;font-size:12px;">PATCH</span></td><td><code>admin/bin-requests/{binRequest}/status</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Update status (Dispatched/Delivered/Canceled). On Delivered &rarr; fires notification + email.</td></tr>
    </tbody>
  </table>
</div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">12</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Admin &mdash; Rewards</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">50</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/rewards</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>All rewards (active + inactive). Paginated.</td></tr>
      <tr><td style="text-align:center;">51</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>admin/rewards</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Create reward: name, description, brand_logo, points_cost, type(percent/fixed), value, is_active.</td></tr>
      <tr><td style="text-align:center;">52</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/rewards/{reward}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Single reward details.</td></tr>
      <tr><td style="text-align:center;">53</td><td style="text-align:center;"><span style="color:#fd7e14;font-weight:bold;font-size:12px;">PUT</span></td><td><code>admin/rewards/{reward}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Update reward fields.</td></tr>
      <tr><td style="text-align:center;">54</td><td style="text-align:center;"><span style="color:#dc3545;font-weight:bold;font-size:12px;">DELETE</span></td><td><code>admin/rewards/{reward}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Soft delete reward.</td></tr>
    </tbody>
  </table>
</div>

<div class="page-break"></div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">13</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Admin &mdash; Vouchers</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">55</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/vouchers</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>All vouchers system-wide. Eager-loads user. Paginated.</td></tr>
      <tr><td style="text-align:center;">56</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>admin/vouchers</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Issue voucher: user_id, code, type, value, expiry_date. Optional points_cost deduction. Fires notification.</td></tr>
    </tbody>
  </table>
</div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">14</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Admin &mdash; Factories</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">57</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/factories</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>List all factories. Paginated.</td></tr>
      <tr><td style="text-align:center;">58</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>admin/factories</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Create factory.</td></tr>
      <tr><td style="text-align:center;">59</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/factories/{id}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Single factory details.</td></tr>
      <tr><td style="text-align:center;">60</td><td style="text-align:center;"><span style="color:#fd7e14;font-weight:bold;font-size:12px;">PUT</span></td><td><code>admin/factories/{id}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Update factory info or capacity limits.</td></tr>
      <tr><td style="text-align:center;">61</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/factories/{id}/deliveries</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Delivery history to this factory.</td></tr>
    </tbody>
  </table>
</div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">15</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Admin &mdash; Waste Categories</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">62</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/waste-categories</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>List all waste types. Filter: ?search=. Cached 10min.</td></tr>
      <tr><td style="text-align:center;">63</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>admin/waste-categories</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Create: name, description, points_per_kg, price_per_kg. Flushes cache.</td></tr>
      <tr><td style="text-align:center;">64</td><td style="text-align:center;"><span style="color:#fd7e14;font-weight:bold;font-size:12px;">PUT</span></td><td><code>admin/waste-categories/{id}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Update waste category. Flushes cache.</td></tr>
      <tr><td style="text-align:center;">65</td><td style="text-align:center;"><span style="color:#dc3545;font-weight:bold;font-size:12px;">DELETE</span></td><td><code>admin/waste-categories/{id}</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Hard delete waste category. Flushes cache.</td></tr>
    </tbody>
  </table>
</div>

<div class="page-break"></div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">16</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Admin &mdash; Reports</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">66</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/reports</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>List generated reports. Eager-loads user. Cached 10min. Paginated.</td></tr>
      <tr><td style="text-align:center;">67</td><td style="text-align:center;"><span style="color:#198754;font-weight:bold;font-size:12px;">POST</span></td><td><code>admin/reports/generate</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Generate PDF report. Payload: {from, to}. Cached 1hr.</td></tr>
      <tr><td style="text-align:center;">68</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/reports/{id}/download</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Download report PDF from public storage.</td></tr>
    </tbody>
  </table>
</div>


<div class="module-section">
  <div style="display:flex;margin-top:15px;border-radius:4px 4px 0 0;overflow:hidden;align-items:stretch;">
    <div style="background-color:#52B788;color:white;font-size:20px;font-weight:bold;padding:8px 20px;display:flex;align-items:center;justify-content:center;">17</div>
    <div style="background-color:#1B4332;color:white;font-size:18px;font-weight:bold;padding:8px 16px;flex-grow:1;display:flex;align-items:center;">Admin &mdash; Notifications</div>
  </div>

  <table>
    <thead>
      <tr><th style="text-align:center;width:5%;">#</th><th style="text-align:center;width:10%;">Method</th><th style="text-align:left;width:35%;">Endpoint</th><th style="text-align:center;width:8%;">Auth</th><th style="text-align:left;width:42%;">Description</th></tr>
    </thead>
    <tbody>
      <tr><td style="text-align:center;">69</td><td style="text-align:center;"><span style="color:#0d6efd;font-weight:bold;font-size:12px;">GET</span></td><td><code>admin/notifications</code></td><td style="text-align:center;"><span style="color:#1B4332;font-weight:bold;font-size:11px;">ADMIN</span></td><td>Platform audit log. Filters: ?user_id=&type=&unread=. Eager-loads user. Paginated.</td></tr>
    </tbody>
  </table>
</div>

