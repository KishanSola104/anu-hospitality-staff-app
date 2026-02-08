<!-- ADD MODAL -->
<div id="addModal" class="modal">
<form method="POST" action="{{ route('admin.vacancies.store') }}">
@csrf
<h3>Add Vacancy</h3>

<input name="title" placeholder="Job Title" required>
<input name="location" placeholder="Location" required>

<select name="job_type">
    <option>Full Time</option>
    <option>Part Time</option>
    <option>Temporary</option>
</select>

<textarea name="description" placeholder="Description" required></textarea>

<button class="btn-primary">Save</button>
<button type="button" onclick="closeModal()">Cancel</button>
</form>
</div>

<!-- EDIT MODAL -->
<div id="editModal" class="modal">
<form id="editForm" method="POST">
@csrf @method('PUT')

<h3>Edit Vacancy</h3>

<input name="title" id="edit_title">
<input name="location" id="edit_location">

<select name="job_type" id="edit_job_type" required>
    <option value="Full Time">Full Time</option>
    <option value="Part Time">Part Time</option>
    <option value="Temporary">Temporary</option>
</select>


<textarea name="description" id="edit_description"></textarea>

<select name="is_active">
    <option value="1">Open</option>
    <option value="0">Closed</option>
</select>

<button class="btn-primary">Save Changes</button>
<button type="button" onclick="closeModal()">Cancel</button>
</form>
</div>
