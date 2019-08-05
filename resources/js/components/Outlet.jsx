import React from 'react';
import Header from './sub-components/Header';
import Footer from './sub-components/Footer';
import RedemptionForm from './sub-components/RedemptionForm';

class Outlet extends React.Component {
  render() {
    const props = { ...this.props };
    return (
      <div>
        <Header />
        <RedemptionForm propsPassed={props} />
        <Footer />
      </div>
    )
  }
}


export default Outlet;