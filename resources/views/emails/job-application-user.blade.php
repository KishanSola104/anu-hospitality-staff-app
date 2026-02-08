<p>Dear {{ $data['name'] }},</p>

<p>Thank you for applying for a position with us.</p>

@if(!empty($data['job_title']))
<p><strong>Job Applied For:</strong> {{ $data['job_title'] }}</p>
@endif

<p>Our team will review your application and contact you if shortlisted.</p>

<p>Best regards,<br>
ANU Hospitality Staff</p>
