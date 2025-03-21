<div>
    <h1>Dashboard</h1>
    <div class="mt-6 text-lg text-center">
        <span class="text-[#ECECEB]">log out</span> 
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="text-red-600 font-semibold hover:text-blue-600">Log Out</button>
        </form>
    </div>
    
</div>
