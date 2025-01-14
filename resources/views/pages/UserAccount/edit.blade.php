<x-authentication.layout>

                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Edit Account
                        </h2>
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Edit all your social medias on yor account. Manage all your social media accounts in one place</div>
                        <div class="intro-x mt-8">

                            <form method="POST" action="{{route('edituserfillaccount', $userinformation->username)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div>
                                    <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                        <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                            @if(!file_exists(public_path().'/storage/'.$userinformation->profilepicture))
                                            <img class="rounded-md"  src="/dist/images/profile-6.jpg">
                                            @else
                                            <img class="rounded-md" src="{{asset('storage/' .$userinformation->profilepicture)}}">
                                            @endif
                                            <div id="remove" title="Remove this profile photo?" name="{{$userinformation->profilepicture}}" class="remove tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2 remove"> <i data-feather="x" class="w-4 h-4 remove"></i> </div>
                                        </div>
                                        <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                            <button type="button" class="button w-full bg-theme-1 text-white">Change Photo</button>
                                            <input name="profilepicture" type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                        </div>
                                    </div>
                                @error('profilepicture')
                                <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
                                @enderror
                            </div>
                            <div>
                            <input name="username" type="text" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Username" value="{{old('username' , $userinformation->username)}}">
                            @error('username')
                        <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
                            @enderror
                        </div>

                        <div>
                            <input name="phone" type="text" class="intro-x login__input input input--lg border border-gray-300 block mt-4" value="{{old("phone", $userinformation->phone)}}" placeholder="+994">
                            @error('phone')
                        <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
                            @enderror
                        </div>

                        <div>
                            <textarea name="about" type="body" class="intro-x login__input input input--lg border border-gray-300 block mt-4" value="{{old('about' , $userinformation->about)}}" placeholder="About">{{old('about', $userinformation->about)}}</textarea>
                            @error('about')
                        <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
                            @enderror
                        </div>


                    </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-center">
                            <button name="save" id="save" type="submit" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3 align-top btn btn-success">Update</button>
                        </form>
                        <a href="{{route('showuserprofile', $userinformation->username)}}"><button class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 dark:border-dark-5 dark:text-gray-300 mt-3 xl:mt-0 align-top">Back</button></a>


                        </div>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $("#remove").click(function(){
                    $.ajax({
                        /* the route pointing to the post function */
                        url: '/pp/{{$userinformation->id}}/remove',
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN, message:$(".getinfo").val()},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            alert('bien');
                        }
                    });
                });
           }):
        </script>
    </x-authentication.layout>
