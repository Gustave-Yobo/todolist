<x-app-layout>
    <form id="destroy{{ $tache->id }}" action="{{ route('dashboard.destroy', $tache->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <a role="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
          onclick="event.preventDefault();
          this.closest('form').submit();">
          Supprimer
        </a>
      </form>
</x-app-layout>
