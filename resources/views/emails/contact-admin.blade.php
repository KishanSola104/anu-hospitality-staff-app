<p><strong>New Contact Us Query Received</strong></p>

<p><strong>Name:</strong> {{ $data['applicant_name'] ?? 'N/A' }}</p>
<p><strong>Company:</strong> {{ $data['company_name'] ?? 'N/A' }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Mobile:</strong> {{ $data['mobile'] ?? 'N/A' }}</p>
<p><strong>Subject:</strong> {{ $data['subject'] ?? 'N/A' }}</p>

<p><strong>Message:</strong></p>
<p>{{ $data['message'] }}</p>
