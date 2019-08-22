import React from 'react';
import Axios from 'axios';

class RedemptionForm extends React.Component {

  constructor(props) {
    super(props);
  }

  outlet = React.createRef();

  state = {
    errors: [],
    participant_name: '',
    loading: false
  }

  componentWillMount() {
    this.setState({
      errors: []
    });
    const props = this.props.propsPassed;
    const code = props.match.params.code;
    axios.get(`/api/redeem_code/${code}`)
      .then(response => {
        this.setState({
          participant_name: response.data
        });
      })
      .catch(error => {
        console.log(error);
      })
  }

  onSubmitHandle = (e) => {
    e.preventDefault();

    this.setState({
      loading: true
    })

    const props = this.props.propsPassed;
    const code = props.match.params.code;

    const
      redeem = {
        redeem_code: code,
        outlet: this.outlet.current.value
      }

    axios.post(`/api/redeem`, redeem)
      .then(response => {
        console.log(response);
        if (response.data) {
          props.history.push('/success');
        } else {
          props.history.push('/error');
        }
      })
      .catch(error => {
        console.log(error.response);

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
      <div>
        <div className="container">
          <div className="row justify-content-center">
            <div className="col-md-6 py-5">
              <div className="text-center">
                <h1>OKTOBERFEST 2019 <br />FREE BEER REDEMPTION</h1>
                <p>Dear {this.state.participant_name}</p>
                <p>To redeem your free  beer, please pass your phone to a staff member to key in the outlet redemption code below.</p>
              </div>
              <div className="card">
                <div className="card-header">For staff redemption purposes only</div>
                <div className="card-body">
                  <form method="POST" action="/signup" onSubmit={this.onSubmitHandle}>
                    <div className="form-group">
                      <label htmlFor="name">Outlet Code</label>
                      <input type="text" ref={this.outlet} className="form-control" id="outlet" name="outlet" placeholder="" />
                      {this.renderErrorFor('outlet')}
                      {this.renderErrorFor('redeem_code')}
                    </div>
                    <div className="form-group">
                      <input type="submit" value={this.state.loading ? 'Submitting..' : 'Submit'} className="btn btn-primary" disabled={this.state.loading} />
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