import React, { Component } from 'react';
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import ReactDOM from 'react-dom';
import Home from './Home';
import Thanks from './Thanks';
import Outlet from './Outlet';
import Success from './Success';
import Error from './Error';
import NotFound from './NotFound';
import Terms from './Terms';
import Privacy from './Privacy';

class App extends Component {
    render() {
        return (
            <BrowserRouter>
                <Switch>
                    <Route exact path='/' component={Home} />
                    <Route path='/thanks' component={Thanks} />
                    <Route path='/:code/outlet' component={Outlet} />
                    <Route path='/success' component={Success} />
                    <Route path='/error' component={Error} />
                    <Route path='/terms' component={Terms} />
                    <Route path='/privacy-policy' component={Privacy} />
                    <Route path='*' exact={true} component={NotFound} />
                </Switch>
            </BrowserRouter>
        )
    }
}

ReactDOM.render(<App />, document.getElementById('app'));
