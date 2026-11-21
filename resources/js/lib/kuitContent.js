/**
 * Centralized content layer for KUIT LIMITED
 * All copy and company data from the official agent brief and profile.
 */

export const company = {
    name: 'KUIT LIMITED',
    legalName: 'KUIT LIMITED',
    rcNumber: 'RC 806865',
    incorporated: '16 March 2009',
    tagline: 'Marine | Construction | Engineering Services',
    address: '132, Airport Road, Effurun-Warri, Delta State, Nigeria',
    headquarters: '132, Airport Road, Effurun-Warri, Delta State',
    phones: ['(+234) 803 280 2038', '(+234) 703 344 2821'],
    primaryPhone: '(+234) 803 280 2038',
    secondaryPhone: '(+234) 703 344 2821',
    whatsappNumber: '+2348032802038',
    email: 'info@kuitltd.com',
    secondaryEmail: 'kuitlimited@yahoo.com',
    domain: 'kuitltd.com',
    website: 'https://kuitltd.com',
    copyright: '© 2009–present KUIT LIMITED. All rights reserved.',
    heroHeadline: 'Marine, Construction and Engineering Services You Can Rely On.',
    heroSubheadline: 'KUIT LIMITED delivers equipment leasing, marine services, engineering and oil & gas support across Nigeria, and now technology solutions for modern businesses.',
};

export const quickStats = [
    { label: 'Incorporated', value: '16 March 2009', detail: 'RC 806865' },
    { label: 'Sectors Served', value: 'Marine | Construction | Engineering | IT', detail: 'Turnkey Contracts & Leasing' },
    { label: 'Track Record', value: 'Oil & Gas and Government', detail: 'Local & Multinational Projects' },
];

export const clientsServed = [
    { name: 'Nigerian National Petroleum Company (NNPC)', sector: 'Oil & Gas / Energy' },
    { name: 'Nigerian Petroleum Development Company (NPDC)', sector: 'Upstream Exploration & Production' },
    { name: 'Century Exploration and Production Limited (CEPL)', sector: 'Energy & Offshore Operations' },
    { name: 'Federal & State Infrastructure Departments', sector: 'Roads, Bridges & Civil Infrastructure' },
];

export const values = {
    smart: {
        title: 'Smart',
        body: 'KUIT LIMITED is at the forefront of industry performance, maintaining high standards of excellence with international reach, practicality and innovation. We deploy modern technology, and our productive capacity has global appeal.',
    },
    safe: {
        title: 'Safe',
        body: 'KUIT LIMITED allows no compromise on safety. We use up-to-date systems, leadership techniques, training and support to manage all stakeholders. We provide health and wellbeing programmes for the long run, and work proactively with customers and relevant parties to eliminate risk through design, development and the construction process. We enforce our rules and foster a positive safety culture.',
    },
    security: {
        title: 'Safety and Security',
        body: 'Qualified safety personnel (QSP) are deployed to site to ensure appropriate action is taken as required.',
    },
    community: {
        title: 'Community Relations & Social Responsibility',
        body: 'Where applicable, we maintain peaceful and responsible relations with host communities.',
    },
};

export const servicePillars = [
    {
        id: 'marine',
        name: 'Marine Services',
        slug: 'marine',
        icon: 'ship',
        summary: 'Tanker vessels, supply vessels, sea-going tug boats and passenger crew boats for maritime operations across Nigeria.',
        description: 'Dependable marine support for offshore energy operations, waterway logistics, and cargo transport. Managed by qualified marine personnel.',
        items: [
            'Tanker vessels',
            'Supply vessels',
            'Sea-going tug boats',
            'Passenger crew boats',
        ],
    },
    {
        id: 'construction-equipment-leasing',
        name: 'Construction & Equipment Leasing',
        slug: 'construction-equipment-leasing',
        icon: 'truck-monster',
        summary: 'Heavy earthmoving machinery leasing (excavators, bulldozers, graders, loaders) and civil infrastructure execution.',
        description: 'Modern Caterpillar and heavy plant fleet available on dry or wet lease with experienced operators, backed by field maintenance.',
        items: [
            'Excavators (CAT 330, CAT 320, CAT 325)',
            'Low-bed trailers & heavy haulage',
            '950 pay-loader (wheel loader)',
            'D6 and D8 bulldozers',
            'Swamp buggy for marshy terrain',
            '60-ton forklift & 60 to 100-ton cranes',
            '140G CAT graders & concrete mixers',
            'Civil works, road/bridge construction & demolition',
        ],
    },
    {
        id: 'engineering',
        name: 'Engineering Services',
        slug: 'engineering',
        icon: 'cogs',
        summary: 'Planning, structural design, electrical and mechanical engineering, and technical procurement.',
        description: 'End-to-end engineering consultancy and field execution adhering to strict technical and safety standards.',
        items: [
            'Infrastructure planning and design',
            'Project planning and engineering modeling',
            'Electrical works and erection of support structures',
            'Mechanical instrumentation and transportation',
            'Materials procurement and supply',
        ],
    },
    {
        id: 'oil-and-gas',
        name: 'Oil & Gas Services',
        slug: 'oil-and-gas',
        icon: 'oil-well',
        summary: 'Specialised technical, field and supply support for energy-sector projects.',
        description: 'Precision E&I maintenance, well intervention, chemical sourcing, and pipeline civil laying.',
        footnote: 'Services are delivered in accordance with applicable project requirements and through appropriately qualified personnel and project partners where required.',
        items: [
            'Electrical & Instrumentation (Robertshaw control panel maintenance)',
            'Well Services (clean-up, post-intervention & stimulation support)',
            'Oilfield Chemical Supply (drilling, completion & treatment chemicals)',
            'Pipeline and Flowline Construction (welding, laying & civil works)',
        ],
    },
    {
        id: 'it-services',
        name: 'IT Services',
        slug: 'it-services',
        icon: 'laptop-code',
        summary: 'Technology solutions that keep your business moving: cloud solutions, application development and software.',
        description: 'Modern digital engineering providing scalable cloud architectures and custom application workflows.',
        items: [
            'Cloud infrastructure setup & hosting',
            'Custom web and mobile app development',
            'Enterprise business software & tools',
            'Managed IT maintenance & helpdesk support',
        ],
        workflow: [
            { step: '1', title: 'Discover', desc: 'Understanding business requirements, workflows and technology objectives.' },
            { step: '2', title: 'Design', desc: 'Solution architecture, interface wireframing, and data security planning.' },
            { step: '3', title: 'Build', desc: 'Modern agile software development, rigorous QA testing and cloud deployment.' },
            { step: '4', title: 'Support', desc: 'Continuous performance monitoring, security updates and ongoing maintenance.' },
        ],
        confirmed: [
            { title: 'Cloud Solutions', desc: 'Cloud setup and migration, hosting, storage, and automated disaster-recovery backup.' },
            { title: 'App Development', desc: 'Modern web and mobile applications tailored for Nigerian business workflows.' },
        ],
        proposed: [
            { title: 'Website Design and Development', desc: 'Corporate, mobile-first responsive web solutions.' },
            { title: 'Custom Business Software', desc: 'Internal operational tools, inventory and workflow automation.' },
            { title: 'IT Consulting & Digital Transformation', desc: 'Advisory support for modernising corporate infrastructure.' },
            { title: 'Managed IT Support and Maintenance', desc: 'Scheduled maintenance, server administration and technical helpdesk.' },
            { title: 'Networking & Infrastructure Support', desc: 'Local network setup, cabling, and communication links.' },
        ],
    },
];

export const equipmentFleet = {
    construction: [
        { name: 'CAT 330 Hydraulic Excavator', category: 'Heavy Earthmoving', image: '/images/equipment-excavator.webp', specs: '30-ton class, deep trenching & quarry operations' },
        { name: 'CAT 320 Hydraulic Excavator', category: 'Medium Earthmoving', image: '/images/equipment-excavator.webp', specs: '20-ton class, versatile civil construction & drainage' },
        { name: 'CAT 325 Hydraulic Excavator', category: 'Heavy Earthmoving', image: '/images/equipment-excavator.webp', specs: '25-ton class, mass excavation and pipe trenching' },
        { name: 'CAT D8 Track Bulldozer', category: 'Bulldozers', image: '/images/equipment-yard-1.webp', specs: 'Heavy crawler dozer for mass earth pushing & sand-filling' },
        { name: 'CAT D6 Track Bulldozer', category: 'Bulldozers', image: '/images/equipment-yard-1.webp', specs: 'Medium crawler dozer for site clearance and grading' },
        { name: 'CAT 140G Motor Grader', category: 'Graders', image: '/images/equipment-graders.webp', specs: 'Precision road sub-base preparation and camber grading' },
        { name: 'CAT 950 Wheel Loader (Pay-loader)', category: 'Loaders', image: '/images/equipment-loader-trucks.webp', specs: 'High-capacity bucket for aggregate and truck loading' },
        { name: 'Low-Bed Heavy Haulage Trailer', category: 'Haulage', image: '/images/equipment-yard-2.webp', specs: 'Plant mobilisation and machinery transport nationwide' },
        { name: '60 to 100-Ton Mobile Hydraulic Crane', category: 'Lifting', image: '/images/project-pipe-laying.webp', specs: 'Industrial lifting, pipe handling and structural erection' },
        { name: '60-Ton Heavy Forklift', category: 'Lifting', image: '/images/equipment-yard-2.webp', specs: 'Yard handling of containerized and palletized heavy cargo' },
        { name: 'Swamp Buggy Excavator', category: 'Specialised Plant', image: '/images/project-drainage.webp', specs: 'Marsh and wetland excavation, dredging and canal clearance' },
        { name: 'Concrete Mixers & Batching Units', category: 'Site Machinery', image: '/images/equipment-mixer.webp', specs: 'On-site concrete preparation and structural pouring' },
        { name: '400 Amp Industrial Welding Machines', category: 'Fabrication', image: '/images/project-pipe-laying.webp', specs: 'Heavy-duty pipeline and structural steel welding' },
        { name: 'High-Pressure Industrial Compressors', category: 'Site Machinery', image: '/images/project-pipe-laying.webp', specs: 'Pneumatic tooling and pressure testing supply' },
    ],
    marine: [
        { name: 'Product Tanker Vessel', category: 'Marine Fleet', image: '/images/marine-tanker.webp', specs: 'Clean petroleum products transport, coastal & deepwater bunkering' },
        { name: 'Offshore Supply Vessel (OSV)', category: 'Marine Fleet', image: '/images/marine-supply-vessel.webp', specs: 'Drilling supply delivery, deck cargo, fuel & water transport' },
        { name: 'Sea-Going Tug Boat', category: 'Marine Fleet', image: '/images/marine-tug.webp', specs: 'Ocean towing, barge positioning, rig moves & anchor handling' },
        { name: 'Passenger Crew Boat (Pelican Calm)', category: 'Marine Fleet', image: '/images/marine-crew-boat.webp', specs: 'High-speed personnel transfer, passenger security & offshore shifts' },
    ],
};

export const projectGallery = [
    { title: 'Site Clearance and Demolition', category: 'Civil Works', image: '/images/project-demolition-1.webp' },
    { title: 'Structural Building Demolition', category: 'Civil Works', image: '/images/project-demolition-2.webp' },
    { title: 'Site Preparation & Debris Clearing', category: 'Civil Works', image: '/images/project-demolition-3.webp' },
    { title: 'Road Construction and Compaction', category: 'Road Infrastructure', image: '/images/project-road-compaction.webp' },
    { title: 'Drainage Channel Excavation', category: 'Civil Works', image: '/images/project-drainage.webp' },
    { title: 'Pipeline Laying & Trenching', category: 'Oil & Gas', image: '/images/project-pipe-laying.webp' },
    { title: 'Earthworks and Sand Filling', category: 'Civil Works', image: '/images/project-earthworks.webp' },
    { title: 'Equipment Yard and Plant Maintenance', category: 'Plant & Fleet', image: '/images/equipment-yard-1.webp' },
    { title: 'Heavy Fleet Mobilisation Yard', category: 'Plant & Fleet', image: '/images/equipment-yard-2.webp' },
    { title: 'Grading and Earth Leveling', category: 'Plant & Fleet', image: '/images/equipment-graders.webp' },
    { title: 'Quarry and Aggregate Handling', category: 'Plant & Fleet', image: '/images/equipment-loader-trucks.webp' },
    { title: 'Wellhead & Control Systems Intervention', category: 'Oil & Gas', image: '/images/oilgas-wellhead.webp' },
];

