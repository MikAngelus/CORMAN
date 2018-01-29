<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>prova bootstrap</title>
    <base href="{{ URL::asset('/') }}" target="_blank">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/custom/loginform.css') }}">
    <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('js/jquery-ui.js') }}"></script> 

  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

  <div class="container">
  @yield('content')

  <div class="container">
    <!-- MultiStep Form -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="msform" action="{{ route('users.store')}}" method="post">
                {{ method_field('POST') }}
                {{csrf_field()}}
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active">Personal Info</li>
                    <li>Professional Profiles</li>
                    <li>Sincro Pubblication</li>
                </ul>
                <!-- fieldsets -->
                <fieldset>
                    <h2 class="fs-title">Personal Details</h2>
                    <h3 class="fs-subtitle"></h3>
                    <input type="text" name="first_name" placeholder="First Name"/>
                    <input type="text" name="last_name" placeholder="Last Name"/>
                    <input type="date" name="birth_date" placeholder="Birth Date"/>
                    <input type="email" name="email" placeholder="Email"/>
                    <input type="password" name="password" placeholder="Password"/>
                    <input type="password" name="cpass" placeholder="Confirm Password"/>
                    <input type="file" name="myfile" placeholder="Profile Photo" />
                    <input type="button" name="next" class="next action-button" value="Next"/>

                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Professional Profiles</h2>
                    <h3 class="fs-subtitle"></h3>
                    <label for="role"> Role </label>
                    <select class="form-control" id="role" name="role">
                      <option>Researcher</option>
                      <option>Ordinary Professor</option>
                      <option>Associate Professor</option>
                      <option>Assistant Professor</option>
                    </select>
                    <input type="text" name="affiliation" placeholder="Affiliation"/>
                    <input type="text" name="topics" placeholder="Topics"/>
                    <input type="text" name="personalLink" placeholder="Personal Link"/>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                <fieldset>

                  <table id="example" class="myclass">
                <thead>
                    <tr>
                        <th>

                        </th>

                        <th>Name</th>
                        <th>Authors</th>
                        <th>Where</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>

                        <td>TCS</td>
                        <td>IT</td>
                        <td>San Francisco</td>

                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>

                        <td>TCS</td>
                        <td>IT</td>
                        <td>San Francisco</td>

                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>

                        <td>TCS</td>
                        <td>IT</td>
                        <td>San Francisco</td>

                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>

                        <td>TCS</td>
                        <td>IT</td>
                        <td>San Francisco</td>

                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>

                        <td>TCS</td>
                        <td>IT</td>
                        <td>San Francisco</td>

                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>

                        <td>TCS</td>
                        <td>IT</td>
                        <td>San Francisco</td>

                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>

                        <td>TCS</td>
                        <td>IT</td>
                        <td>San Francisco</td>

                    </tr>
                </tbody>
                </table>
                <button type="button" id="selectAll" class="btn btn-primary"> <span class="sub"></span> Select</button>
            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
            <input type="submit" name="submit" class="submit action-button" value="Submit"/>
          </fieldset>
            </form>
            <!-- link to designify.me code snippets -->
            <div class="dme_link">
                <p><a href="http://designify.me/code-snippets-js/" target="_blank">More Code Snippets</a></p>
            </div>
            <!-- /.link to designify.me code snippets -->
        </div>
    </div>
  </div>

  </div>

  {{-- footer --}}
  <div class="card">
    <div class="card-body text-center">
      Quista ete la sezione de fuutter.
</div>
    <script src="{{ url('js/popper.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/jqueryform.js') }}"></script>
    <script>
    $(document).ready(function () {
  $('body').on('click', '#selectAll', function () {
    if ($(this).hasClass('allChecked')) {
        $('input[type="checkbox"]', '#example').prop('checked', false);
    } else {
        $('input[type="checkbox"]', '#example').prop('checked', true);
    }
    $(this).toggleClass('allChecked');
  })
});
</script>
