//
//  ViewController.swift
//  Hello World
//
//  Created by Camille Frazier on 1/18/18.
//  Copyright © 2018 Camille Frazier. All rights reserved.
//

import UIKit

class ViewController: UIViewController {

    @IBOutlet weak var helloLabel: UILabel!
    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view, typically from a nib.
        
        helloLabel.text = "Welcome!"
        
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }

    @IBAction func sayHello(_ sender: UIButton) {
    }
    
    
    @IBAction func clearLabel(_ sender: UIButton) {
    }
}

