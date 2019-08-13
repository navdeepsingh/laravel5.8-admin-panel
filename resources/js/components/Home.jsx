import React from 'react';
import Header from './sub-components/Header';
import Footer from './sub-components/Footer';
import SignupForm from './sub-components/SignupForm';

class Home extends React.Component {

  constructor(props) {
    super(props);
  }

  render() {
    const props = this.props.history;
    return (
      <div>
        <Header />
        <SignupForm propsPassed={props} />
        <Footer />
      </div>
    )
  }
}


export default Home;