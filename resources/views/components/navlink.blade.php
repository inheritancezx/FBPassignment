<a {{ $attributes }}
class="rounded-md px-3 py-2 text-sm font-medium 
    {{ $active ? 'bg-gray-600 text-yellow-100' : 'text-gray-600 hover:bg-gray-600 hover:text-yellow-100' }}" 
aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</a>

