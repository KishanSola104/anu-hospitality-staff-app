<p>A new job application has been received.</p>

<ul>
    <li><strong>Name:</strong> {{ $data['name'] }}</li>
    <li><strong>Email:</strong> {{ $data['email'] }}</li>
    <li><strong>Mobile:</strong> {{ $data['mobile'] }}</li>

    @if(!empty($data['job_title']))
    <li><strong>Job Title:</strong> {{ $data['job_title'] }}</li>
    @endif
</ul>

<p>Please login to the admin panel to review the application.</p>
