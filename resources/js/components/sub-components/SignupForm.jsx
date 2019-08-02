import React from 'react';

class SignupForm extends React.Component {

  name = React.createRef();
  email = React.createRef();
  phone = React.createRef();
  beer = React.createRef();
  optIn = React.createRef();

  state = {
    errors: []
  }

  componentWillMount() {
    this.setState({
      errors: []
    })
  }

  onSubmitHandle = (e) => {
    e.preventDefault();

    const signup = {
      name: this.name.current.value,
      email: this.email.current.value,
      phone: this.phone.current.value,
      beer: this.beer.current.selectedOptions[0].text,
      opt_in: this.optIn.current.checked,
    }

    console.log(signup);

    axios.post('/signup', signup)
      .then(response => {
        console.log(response);
        // redirect to the homepage
        //history.push('/')
      })
      .catch(error => {
        console.log(error.response);

        this.setState({
          errors: error.response.data.errors
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
      <div>
        <div className="container">
          <div className="row justify-content-center">
            <div className="col-md-12">
              <div className="card">
                <div className="card-header">Signup</div>
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
                      <input type="text" ref={this.phone} className="form-control" id="phone" name="phone" placeholder="Enter Contact No." />
                      {this.renderErrorFor('phone')}
                    </div>
                    <div className="form-group">
                      <label htmlFor="beer">Preffered Beer</label>
                      <select name="beer" ref={this.beer} id="beer" className="form-control">
                        <option value="">Beer 1</option>
                        <option value="">Beer 2</option>
                        <option value="">Beer 3</option>
                      </select>
                      {this.renderErrorFor('beer')}
                    </div>
                    <div className="form-group form-check">
                      <input type="checkbox" ref={this.optIn} className="form-check-input" id="opt_in" defaultChecked value="1" />
                      <label className="form-check-label" htmlFor="exampleCheck1">Opt In</label>
                    </div>
                    <div className="form-group">
                      <input type="submit" value="Submit" className="btn btn-primary" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}


export default SignupForm;