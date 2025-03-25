@extends('layouts.forms')

@section('content')

<a href="{{route('welcome')}}" class="absolute top-4 left-8 text-white text-4xl">
        &larr;
</a>
<div class="w-full max-w-2xl bg-purple-500 p-6 sm:p-10 rounded-3xl shadow-lg text-white text-center">
    <h2 class="text-2xl sm:text-3xl font-bold text-white">S'inscrire</h2>
    <p class="text-base sm:text-lg mt-2">Créez votre compte maintenant !</p>
    <form class="mt-6 text-left">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium">Nom Complet</label>
                <input type="text" placeholder="Nom Complet" class="w-full px-4 py-3 mt-2 bg-white text-gray-800 border-none rounded-lg focus:outline-none">
            </div>
            <div>
                <label class="block font-medium">Numéro de téléphone</label>
                <input type="text" placeholder="Numéro de téléphone" class="w-full px-4 py-3 mt-2 bg-white text-gray-800 border-none rounded-lg focus:outline-none">
            </div>
            <div>
                <label class="block font-medium">E-mail</label>
                <input type="text" placeholder="E-mail" class="w-full px-4 py-3 mt-2 bg-white text-gray-800 border-none rounded-lg focus:outline-none">
            </div>
            <div>
                <label class="block font-medium">Mot de passe</label>
                <input type="password" placeholder="Mot de passe" class="w-full px-4 py-3 mt-2 bg-white text-gray-800 border-none rounded-lg focus:outline-none">
            </div>
            
        </div>
        <div class="mt-4 relative">
            <div>
                <label class="block font-medium">Confirmation Mot de passe</label>
                <input type="password" placeholder="Confirmation" class="w-full px-4 py-3 mt-2 bg-white text-gray-800 border-none rounded-lg focus:outline-none">
            </div>
            <label class="block font-medium">Vous êtes</label>
            <div class="relative">
                <select class="w-full px-4 py-3 mt-2 bg-white text-gray-800 border-none rounded-lg focus:outline-none appearance-none">
                    <option>Influenceur(Euse)</option>
                    <option>Marque</option>
                </select>
                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="mt-4 flex items-center">
            <input type="checkbox" id="terms" class="w-4 h-4 text-purple-900 border-gray-300 rounded focus:ring-purple-500">
            <label for="terms" class="ml-2 text-sm">J’accepte les <a href="#" class="underline">termes et conditions</a> de Cocollab.</label>
        </div>
        <button type="submit" class="w-full mt-6 bg-purple-900 text-white py-3 rounded-lg hover:bg-purple-950 transition">S’inscrire</button>
    </form>
    <p class="mt-4 text-xs sm:text-sm">Vous avez déjà un compte ? <a href="{{route('login')}}" class="text-white underline">Connectez-vous.</a></p>
</div>

@endsection