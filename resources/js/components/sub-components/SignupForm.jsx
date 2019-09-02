import React from 'react';

class SignupForm extends React.Component {

  constructor(props) {
    super(props);
    console.log(this.props);
  }

  name = React.createRef();
  email = React.createRef();
  phone = React.createRef();
  beer = React.createRef();
  optIn = React.createRef();

  state = {
    loading: false,
    errors: []
  }

  componentWillMount() {
    this.setState({
      errors: []
    })
  }

  onSubmitHandle = (e) => {
    e.preventDefault();
    this.setState({
      loading: true
    });

    const history = this.props.propsPassed;

    const signup = {
      name: this.name.current.value,
      email: this.email.current.value,
      phone: this.phone.current.value,
      beer: this.beer.current.selectedOptions[0].text,
      opt_in: this.optIn.current.checked === true ? 1 : 0
    }


    axios.post('/api/signup', signup)
      .then(response => {
        if (response.status == 200) {
          // redirect to the thanks
          history.push('/thanks#top');
          window.location = '/thanks#top'
        }
      })
      .catch(error => {
        console.log(error);

        this.setState({
          errors: error.response.data.errors,
          loading: false
        })
      })
  }

  hasErrorFor = (field) => {
    return !!this.state.errors[field]
  }

  renderErrorFor = (field) => {
    if (this.hasErrorFor(field)) {
      return (
        <span className='invalid-feedback'>
          <strong>{this.state.errors[field][0]}</strong>
        </span>
      )
    }
  }

  render() {
    return (
      <div className="home">

        <div className="container-fluid">
          <div className="row pb-5">
            <div className="col-md-12">

              <div className="intro row py-4 justify-content-center">
                <div className="col-md-6 text-center">
                  <h2>Get your free beer* at Brotzeit this Oktoberfest!</h2>
                  <p>
                    Step 1: Fill in the form below<br />
                    Step 2: Look out for an email from Brotzeit<br />
                    Step 3: Head to your nearest Brotzeit outlet from 3 Sep - 15 Oct 2019 to redeem!
                    </p>
                </div>
              </div>
              <div className="row justify-content-center pt-5">
                <div className="col-md-6">
                  <div className="card">
                    <div className="card-body">
                      <form method="POST" action="/signup" onSubmit={this.onSubmitHandle}>
                        <div className="form-group">
                          <label htmlFor="name">Name</label>
                          <input type="text" ref={this.name} className="form-control" id="name" name="name" placeholder="Enter name" />
                          {this.renderErrorFor('name')}
                        </div>
                        <div className="form-group">
                          <label htmlFor="email">Email address</label>
                          <input type="email" ref={this.email} className="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" />
                          <small id="emailHelp" className="form-text text-muted">We'll never share your email with anyone else.</small>
                          {this.renderErrorFor('email')}
                        </div>
                        <div className="form-group">
                          <label htmlFor="phone">Contact No</label>
                          <input type="number" ref={this.phone} className="form-control" id="phone" name="phone" placeholder="Enter contact no." />
                          {this.renderErrorFor('phone')}
                        </div>
                        <div className="form-group">
                          <label htmlFor="beer">Preferred Beer</label>
                          <select name="beer" ref={this.beer} id="beer" className="form-control">
                            <option value="HB Original Oktoberfest Märzen Beer">HB Original Oktoberfest Märzen Beer</option>
                            <option value="HB Weisse Beer">HB Weisse Beer</option>
                          </select>
                          {this.renderErrorFor('beer')}
                        </div>
                        <div className="form-group form-check">
                          <input type="checkbox" ref={this.optIn} className="form-check-input" id="opt_in" defaultChecked value="1" />
                          <label className="form-check-label" htmlFor="opt_in">Sign up for Brotzeit's mailing list to receive exclusive promotions and more!</label>
                        </div>
                        <div className="form-group">
                          <input type="submit" value={this.state.loading ? 'Loading...' : 'Submit'} className="btn btn-primary"
                            disabled={this.state.loading}
                          />
                        </div>
                        <p>
                          <strong>Terms &amp; Conditions</strong><br />
                          *With a minimum order of 1 menu item at your preferred Brotzeit outlet.
                          Limited to 1 redemption per person on selected beers only, while stock
                          lasts. This offer is valid from 3 September 2019 until 15 October 2019 unless otherwise stated.
                          Not valid with any other discounts, promotions, privilege cards or
                          vouchers. The management reserves the rights to amend the terms and
                          conditions without any prior notice.
                        </p>
                      </form>
                    </div>
                  </div>

                  <div className="text-center pt-5">
                    <p><strong>Follow us for more exclusive Oktoberfest deals!</strong></p>
                    <ul className="list-inline social-links">
                      <li className="list-inline-item"><a href="https://www.facebook.com/brotzeit.co/" target="_blank"><i className="fa fa-facebook"></i></a></li>
                      <li className="list-inline-item"><a href="https://www.instagram.com/brotzeit.sg/" target="_blank"><i className="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div >
    )
  }
}


export default SignupForm;