<!-- Sidebar -->
<div id="sidebar"
    class="fixed inset-y-0 left-0 w-64 bg-slate-700 border-r z-50 border-gray-200 p-4 sidebar-transition hidden-sidebar md:static md:transform-none">
    <div class="flex justify-center">
        <a href="{{ url('/') }}">
            <span class="grid h-10 place-content-center rounded-lg text-xl text-white px-3">
                Mail Serv!s
            </span>
        </a>
    </div>

    <ul id="sidebar-menu" class="mt-6 space-y-1">
        <li>
            <a href="{{ url('admin/dashboard') }}"
                class="block rounded-lg px-4 py-3 text-sm font-medium hover:bg-gray-100 hover:text-gray-700 {{ Request::is('admin/dashboard') ? 'bg-gray-100 text-gray-500' : 'text-white' }}">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ url('admin/daftar-perbaikan') }}"
                class="block rounded-lg px-4 py-3 text-sm font-medium hover:bg-gray-100 hover:text-gray-700 {{ Request::is('admin/daftar-perbaikan*') ? 'bg-gray-100 text-gray-500' : 'text-white' }}">
                <i class="fas fa-tools mr-2"></i> Daftar Perbaikan
            </a>
        </li>
    </ul>
</div>
