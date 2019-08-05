import React from 'react';
import Axios from 'axios';

class RedemptionForm extends React.Component {

  constructor(props) {
    super(props);
    console.log(this.props);
  }

  outlet = React.createRef();

  state = {
    errors: []
  }

  componentWillMount() {
    this.setState({
      errors: []
    })
  }

  componentDidMount() {
    const props = this.props.propsPassed;
    const code = props.match.params.code;
  }

  onSubmitHandle = (e) => {
    e.preventDefault();

    const props = this.props.propsPassed;
    const code = props.match.params.code;

    const
      redeem = {
        redeem_code: code,
        outlet: this.outlet.current.value
      }

    console.log(redeem);


    axios.post(`/api/redeem`, redeem)
      .then(response => {
        console.log(response)
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
                <div className="card-header">STAFF REDEMPTION</div>
                <div className="card-body">
                  <form method="POST" action="/signup" onSubmit={this.onSubmitHandle}>
                    <div className="form-group">
                      <label htmlFor="name">Outlet Code</label>
                      <input type="text" ref={this.outlet} className="form-control" id="outlet" name="outlet" placeholder="" />
                      {this.renderErrorFor('outlet')}
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


export default RedemptionForm;