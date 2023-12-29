@if(auth()->user()->is_admin)
    <!-- Additional content or functionality for admins -->
    <div>
        <!-- Content specific to admin users -->
        <h3>Admin Dashboard</h3>
        <!-- Add any additional content or functionality for admins here -->

        <!-- Display a form to create teams and assign tasks to team members -->
        <form method="post" action="{{ route('teams.create') }}">
            @csrf
            <!-- Include form fields for team creation and task assignment as needed -->
            <!-- For example, you might have fields for team name, task selection, etc. -->
            <button type="submit">Create Team</button>
        </form>
    </div>
@else