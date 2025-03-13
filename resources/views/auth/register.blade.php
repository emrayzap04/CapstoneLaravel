
<x-guest-layout>
    <x-authentication-card class="">
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" style="width: 50%;" />

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <!-- Flex Container for Two Columns -->
            <div class="grid grid-cols-2 gap-4">

                <!-- Left Column -->
                <div>
                    <x-label for="name" value="Name" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />

                    <x-label for="student_id" value="Student ID" class="mt-4" />
                    <x-input id="student_id" class="block mt-1 w-full" type="text" name="student_id" required />

                    <x-label for="email" value="Email" class="mt-4" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" required />
                   
                    <!-- <x-label for="course" value=course" class="mt-4" />
                    <x-input id="course" class="block mt-1 w-full" type="course" name="course" /> -->

                    <x-label for="phone" value="Phone" class="mt-4" />
                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" required />

                    <x-label for="address" value="Address" class="mt-4" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" required />
                </div>


                <!-- Right Column -->
                <div >

                <!-- <x-label for="course" value="Course" class="mt-4" />
                    <x-input id="course" class="block mt-1 w-full" type="text" name="course" /> -->
                    <x-label for="course" value="Course"  />
                    <select id="course" name="course" class="block mt-1 w-full p-2 border rounded mb-4" onchange="updateYearLevel()">
                        <option value="#" disabled selected>Select Course</option>
                        <option value="bsit">B.S IT</option>
                        <option value="bshm">B.S HM</option>
                        <option value="educ">EDUC</option>
                        <option value="accountancy">Accountancy</option>
                        <option value="bsa">B.S Administration</option>
                    </select>

                    <x-label for="education_level" value="Education Level" />
                    <select id="education_level" name="education_level" class="block mt-1 w-full p-2 border rounded" onchange="updateYearLevel()">
                        <option value="#" disabled selected>Select grade level</option>
                        <option value="college">College</option>
                        <option value="senior_high">Senior High</option>
                        <option value="high_school">High School</option>
                    </select>

                    <x-label for="year_level" value="Year Level" class="mt-4" />
                    <select id="year_level" name="year_level" class="block mt-1 w-full p-2 border rounded"></select>

                    <x-label for="password" value="Password" class="mt-4" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />

                    <x-label for="password_confirmation" value="Confirm Password" class="mt-4" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                </div>
            </div>

            <!-- Terms & Conditions -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <span class="ml-2">
                                I agree to the
                                <a href="{{ route('terms.show') }}" class="underline text-sm text-blue-600 hover:text-blue-800">Terms of Service</a>
                                and
                                <a href="{{ route('policy.show') }}" class="underline text-sm text-blue-600 hover:text-blue-800">Privacy Policy</a>
                            </span>
                        </div>
                    </x-label>
                </div>
            @endif

            <!-- Buttons -->
            <div class="flex items-center justify-between mt-4">
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">Already registered?</a>
                <x-button class="bg-green-600 hover:bg-[#AD1457] text-white px-2 py-2 rounded" style="font-size: 17px; padding: 18px; height: auto; font-family:Arial, Helvetica, sans-serif;">Register</x-button>
            </div>
        </form>
    </x-authentication-card>

    <script>
        function updateYearLevel() {
            const educationLevel = document.getElementById('education_level').value;
            const yearLevelSelect = document.getElementById('year_level');
            yearLevelSelect.innerHTML = "";

            let options = [];
            if (educationLevel === "college") {
                options = ["1st Year", "2nd Year", "3rd Year", "4th Year", "Extended Year"];
            } 
            else if (educationLevel === "senior_high") {
                options = ["Grade 11", "Grade 12"];
            }
            else if (educationLevel === "high_school") {
                options = ["Grade 7", "Grade 8", "Grade 9", "Grade 10"];
            }
            else {
                options = [""];
            }

            options.forEach(level => {
                let optionElement = document.createElement("option");
                optionElement.value = level.toLowerCase().replace(" ", " ");
                optionElement.textContent = level;
                yearLevelSelect.appendChild(optionElement);
            });
        }

        document.addEventListener("DOMContentLoaded", updateYearLevel);


    </script>
</x-guest-layout>