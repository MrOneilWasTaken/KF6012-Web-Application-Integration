import React from "react";
/**
 * Select Award component
 * 
 * This component formats the input for the user to choose which award they want to search by
 *  
 * @author Sam Oneil w18018623
 *  
 */

class SelectAward extends React.Component {

    render() {
        return (
            <label>
                <p class="award-search">Award:</p>
                <select value={this.props.award} onChange={this.props.handleAwardSelect}>
                    <option value="">Any</option>
                    <option value="1">Best Paper</option>
                    <option value="2">Best paper honourable mention</option>
                    <option value="3">Best pictorial</option>
                    <option value="4">Best pictorial honourable mention</option>
                    <option value="5">Special recognition for diversity and inclusion</option>
                    <option value="all">All</option>
                </select>
            </label>

        )
    }
}

export default SelectAward;